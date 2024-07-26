<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy($imageId)
    {
        $image = Image::findOrFail($imageId);
        Storage::disk('public')->delete($image->image);
        $image->delete();

        return response()->json(['success' => true]);
    }
}

