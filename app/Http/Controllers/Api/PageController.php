<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 

// Models
use App\Models\Apartment;
use App\Models\Service;

use Exception;

class PageController extends Controller
{
    // home page
    public function home()
    {
    }

    // index apartments 
    public function index()
    {
    }

    // show apartments ::slug
    public function show($slug)
    {

        try {
            $apartment = Apartment::where('slug', $slug)->with('services')->firstOrFail();
    
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