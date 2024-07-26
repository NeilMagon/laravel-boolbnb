<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Models\View;


class ApartmentController extends Controller
{
    public function index (){
         $apartments = Apartment::with('user')->get();
    
    return response()->json([
        'success' => true,
        'results' => $apartments
    ]);
    }

    
    public function show($slug, Request $request){
        // Recupera l'indirizzo IP del visitatore
        $visitorIp = $request->ip();

        // Recupera l'appartamento basato sullo slug fornito
        $apartment = Apartment::where('slug', $slug)->with('images', 'services')->first();

        if (!$apartment) {
            // Se non viene trovato alcun appartamento
            return response()->json([
                'success' => false,
                'error' => 'Nessun appartamento trovato'
            ]);
        }

        // Verifica se l'indirizzo IP è già stato registrato per questo appartamento nella sessione attuale
        $alreadyVisited = View::where('apartment_id', $apartment->id)
                            ->where('address_ip', $visitorIp)
                            ->exists();

        if (!$alreadyVisited) {
            // Se l'indirizzo IP non è stato ancora registrato, procedi con la registrazione
            // Salva l'indirizzo IP visitatore nel database
            View::create([
                'apartment_id' => $apartment->id,
                'address_ip' => $visitorIp,
                'date_visit' => now()
            ]);
        }

        // Restituisci la risposta JSON con i dettagli dell'appartamento
        return response()->json([
            'success' => true,
            'results' => $apartment
        ]);
    }

    public function search(Request $request)
    {
        
        if($request->latitude){
            $latitude= $request->latitude;
        } else{
            $latitude = '';
        }

        if($request->longitude){
            $longitude= $request->longitude;
        }else{
            $longitude='';
        }
        if($request->distance){
            $distance= $request->distance;
        }else{
            $distance='20000';
        }
    

        $apartments = Apartment::findNearby($latitude, $longitude, $distance);
        if (count($apartments) < 1) {
            return response()->json([
                'result' => false,
            ]);
        }

        $apartmentIds = array_column($apartments, 'id');
        $apartmentsWithRelations = Apartment::whereIn('id', $apartmentIds)
            ->with('services', 'user')
            ->get();

        foreach ($apartmentsWithRelations as $index => $apartment) {
            $apartment->distance_km = $apartments[$index]->distance_km; 
        }

        $sortedApartments = $apartmentsWithRelations->sortBy('distance_km')->values()->all();

        return response()->json([
            'result' => true,
            'apartments' => $sortedApartments,
        ]);
    }
}
