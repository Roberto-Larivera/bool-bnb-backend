<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


// Models
use App\Models\Apartment;
use App\Models\Service;
use Database\Seeders\ApartmentSeeder;
// Facades
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Exception;

class PageController extends Controller
{
    // home page
    public function home()
    {

        $apartments = Apartment::whereHas('sponsors', function ($query) {
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
        $itemsPerPage = 20;


        $idSponsor = Apartment::whereHas('sponsors', function ($query) {
            $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
        })->pluck('id')->toArray();

        $array = [];
        foreach ($idSponsor as $key => $value) {
            $array[] = $value;
        }

        $oggi = Carbon::today();

        $data = Apartment::leftJoin('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')
            ->select('apartments.*')
            ->with(['sponsors' => function ($query) use ($oggi) {
                $query->where('deadline', '>=', $oggi)
                    ->orderBy('deadline', 'asc');
            }])
            ->orderByRaw('CASE WHEN apartment_sponsor.deadline >= ? THEN 0 ELSE 1 END, apartment_sponsor.deadline ASC', [$oggi])
            ->paginate(20);

        // aggiunto parametro 
        foreach ($data as $key => $value) {
            if (in_array($value['id'], $array))
                $value['sponsored'] = true;
            else
                $value['sponsored'] = false;
        }

        if (count($data) > 0)
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'apartments' => $data
            ];
        else
            $response = [
                'success' => false,
                'code' => 404,
                'message' => 'Non ci sono appartamenti da visualizzare'
            ];

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