<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function services(){
        $services= Service::all();
        if($services){
            return response()->json([
                'success'=> true,
                'results'=> $services
            ]);
        }
    }
}
