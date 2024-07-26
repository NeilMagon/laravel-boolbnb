<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Apartment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'address',
        'thumb',
        'price',
        'address',
        'square_meters',
        'number_of_room',
        'number_of_bed',
        'number_of_bath',
        'description',
        'latitude',
        'longitude'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function messages() {
        return $this->hasMany(Message::class);
    }

    public function views() {
        return $this->hasMany(View::class);
    }

    public function sponsorships() {
        return $this->belongsToMany(Sponsorship::class)
                    ->withPivot('expire_date', 'start_date');
    }

    public function services() {
        return $this->belongsToMany(Service::class, 'apartment_service');
    }

    public static function findNearby($latitude, $longitude, $distance)
    {
        return DB::select(
            DB::raw("
                SELECT *,
                       ST_distance_sphere(
                           point(?, ?),
                           point(latitude, longitude)
                       ) / 1000 AS distance_km
                FROM apartments
                WHERE ST_distance_sphere(
                    point(?, ?),
                    point(latitude, longitude)
                ) < ?
            "),
            [$latitude, $longitude, $latitude, $longitude, $distance]
        );
    }
}
