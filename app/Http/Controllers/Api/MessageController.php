<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Apartment;

class MessageController extends Controller
{
    public function store(Request $request){

        $validateData = $request->validate([
            'email' => 'required|email',
            'object' => 'nullable|string',
            'name' => 'required|string',
            'description' => 'required|string',
            'apartment_id' => 'required|exists:apartments,id'
        ]);

        $message = new Message([
            'apartment_id' => $validateData['apartment_id'],
            'email' => $validateData['email'],
            'object' => $validateData['object'],
            'name' => $validateData['name'],
            'description' => $validateData['description']
        ]);

        if (auth()->check()) {
            $message->associateUser(auth()->user());
        } else {
            $message->email = $validateData['email'];
        }
        
        $message->save();

        return response()->json(['message' => 'Messaggio inviato con successo!']); 
    }

    public function index()
    {
        $user = Auth::user();
        $apartmentIds = Apartment::where('user_id', $user->id)->pluck('id');

        $messages = Message::whereIn('apartment_id', $apartmentIds)->with('apartment')->get();

        foreach ($messages as $message) {
            $message->markAsRead();
        }
        
        return view('admin.message.index', compact('messages'));
    }

    public function destroy($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect()->route('admin.message.index')->with('success', 'Messaggio eliminato con successo!');
    }

    public function trashed()
    {
        $user = Auth::user();
        $apartmentIds = Apartment::where('user_id', $user->id)->pluck('id');

        $messages = Message::onlyTrashed()->whereIn('apartment_id', $apartmentIds)->with('apartment')->get();

        return view('admin.message.trashed', compact('messages'));
    }

    public function restore($id)
    {
        $message = Message::onlyTrashed()->findOrFail($id);
        $message->restore();

        return redirect()->route('admin.message.trashed')->with('success', 'Messaggio ripristinato con successo!');
    }
}
