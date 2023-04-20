<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// Models
use App\Models\Apartment;


use Exception;

class PageController extends Controller
{
    // home page
    public function home()
    {

        $apartments = Apartment::whereHas('sponsors', function($query) {
            $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
        })->get();
        
        $response = [
            'success' => true,
            'code' => 200,
            'message' => 'OK',
            'apartments' => $apartments
        ];

        return response()->json($response);

    }

    // index apartments 
    public function index()
    {
        $apartments = Apartment::all();
        if (count($apartments) > 0)
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'apartment' => $apartments
            ];
        else
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Non ci sono appartamenti da visualizzare'
            ];
        // try {
        //     $apartments = Apartment::where('slug', $slug)->with('services')->firstOrFail();

        //     $response = [
        //         'success' => true,
        //         'code' => 200,
        //         'message' => 'OK',
        //         'apartment' => $apartment
        //     ];
        // } catch (Exception $e) {
        //     $response = [
        //         'success' => false,
        //         'code' => $e->getCode(),
        //         'message' => $e->getMessage()
        //     ];
        // }

        return response()->json($response);
    }

    // show apartments ::slug
    public function show($slug)
    {

        try {
            $apartment = Apartment::where('slug', $slug)->with('services' , 'user.user_data')->firstOrFail();
    
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'apartment' => $apartment
            ];
        } catch (Exception $e) {
            $response = [
                'success' => false,
                'code' => $e->getCode(),
                'message' => $e->getMessage()
            ];
        }

        return response()->json($response);
    }
}

// format
/*

if($project)
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'project' => $project
            ];
        else
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'NOT FOUND'
            ];

*/