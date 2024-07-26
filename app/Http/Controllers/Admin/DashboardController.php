<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Sponsorship;
use App\Models\View;
use App\Models\Apartment;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();

        $apartments = Apartment::withTrashed()->with(['messages' => function ($query) {
            $query->withTrashed();
        }])->where('user_id','=', $user->id)->get();
        $apartmentsCount = $user->apartments->count();
        $sponsorsCount = $user->apartments()->where('visibility', 1)->count();
       

        $apartmentStats = $apartments->map(function ($apartment) {
            return [
                'title' => $apartment->title,
                'thumb' => $apartment->thumb,
                'total_views' => $apartment->views->count(),
                'total_messages' => $apartment->messages->count(),
            ];
        });
        
        $apartmentData = [
            'total_apartments' => $apartmentsCount,
            'total_sponsors' => $sponsorsCount,
        ];

        return view('admin.dashboard', compact('apartmentData', 'apartmentStats'));
    }
}
