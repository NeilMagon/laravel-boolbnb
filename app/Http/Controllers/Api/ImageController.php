<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ImageController extends Controller
{
    public function show($filename)
    {
        $path = Storage::disk()->path('apartment_image/'.$filename);
        

        return response()->file($path);
    }
  
}
