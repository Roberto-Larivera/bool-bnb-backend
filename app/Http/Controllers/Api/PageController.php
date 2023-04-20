<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Apartment;
use App\Models\Service;

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