<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'apartment_id',
        'email',
        'object',
        'name',
        'description',
        'is_read' 
    ];

    public function associateUser($user){
        $this->user_id = $user->id;
        $this->email = $user->email;
    }

    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }

    public function markAsRead()
    {
        $this->is_read = true;
        $this->save();
    }

}
