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

        $apartments = Apartment::whereHas('sponsors', function($query) {
            $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
        })->limit(4)->get();

        foreach ($apartments as $key => $value) {
            $value['sponsored']= true;
        }
        
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
        $itemsPerPage = 5;
        
        $apartments = Apartment::paginate($itemsPerPage);

        if (count($apartments) > 0)
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'apartments' => $apartments
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
            $apartment = Apartment::where('slug', $slug)->with('services' , 'user.user_data', 'views')->withCount('views')->firstOrFail();
    
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

    // home page
    public function services()
    {
        $services = Service::all();

        

        if (count($services) > 0)
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'services' => $services
            ];
        else
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Non ci sono servizi da visualizzare'
            ];

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