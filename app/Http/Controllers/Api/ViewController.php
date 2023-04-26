<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;



// Models
use App\Models\View;

class ViewController extends Controller
{
    
    public function store(Request $request)
    {
        $apartment_id = $request->apartment_id;
        $ip_address = $request->ip_address;
        
        $existingView = View::where('apartment_id', $apartment_id)
            ->where('ip_address', $ip_address)
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->first();
        
        if ($existingView) {
            return response()->json([
                'success' => false,
                'message' => 'Questo ip ha già guardato questo appartamento nelle ultime 24 ore'
            ]);
        }
        
        // Create a new view
        $view = new View;
        $view->apartment_id = $apartment_id;
        $view->ip_address = $ip_address;
        $view->save();

        return response()->json([
            'success' => true,
            'message' => 'La visualizzazione è stata registrata con successo',
            'data' => $view
        ]);
    }

}
