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
        $itemsPerPage = 20;

        /*
        $data = Apartment::paginate($itemsPerPage);
        
        // $apartments = Apartment::all();
        $apartmentsSponsor = Apartment::whereHas('sponsors', function($query) {
            $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
        })->get();
        */

        // sistemare da qui 

        //    $data = DB::select('SELECT a.* FROM apartments a LEFT JOIN apartment_sponsor s ON a.id = s.apartment_id ORDER BY CASE WHEN s.deadline >= CURRENT_DATE THEN 0 ELSE 1 END, s.deadline ASC');

        // $apartments = Apartment::select('SELECT a.* FROM apartments a LEFT JOIN apartment_sponsor s ON a.id = s.apartment_id ORDER BY CASE WHEN s.deadline >= CURRENT_DATE THEN 0 ELSE 1 END, s.deadline ASC')->paginate(5);

        // dd($apartments);

        // $data = Apartment::whereHas('sponsors', function($query)  {
        //     $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
        // })
        // ->whereDoesntHave('sponsors', function($query) {
        //     $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
        // })
        // ->get();

        // $sku['orders'] = Order::whereHas('OrderDetails', function ($query) use ($sku) {
        //     $query->where('sku_id', $sku->id)->where(function ($query) {
        //         $query->doesntHave('Container')->orWhereHas('Container', function ($query) {
        //             $query->where('delivered', 0);
        //         })
        //     });
        // })->get();


        $idSponsor = Apartment::whereHas('sponsors', function ($query) {
            $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
        })->pluck('id')->toArray();
        // $data = Apartment::whereDoesntHave('sponsors', function ($query) {
        //     $query ->where('deadline', '>=', Date('Y-m-d H:m:s'));
        // })->get();


        // $apartments = Apartment::whereHas('sponsors', function ($query) {
        //     $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
        // })->get();

        
        
        // $apartments = Apartment::whereHas('sponsors', function($query) {
        //     $query->where('deadline', '>=', now());
        // })
        // ->orWhereDoesntHave('sponsors')->get();
        // $excludedApartments = $apartments->pluck('id')->toArray();
        // $data = Apartment::whereNotIn('id', $excludedApartments)->paginate(20);
        $oggi = Carbon::today();
        
        $data = Apartment::leftJoin('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')
        ->select('apartments.*')
        ->with(['sponsors' => function ($query) use ($oggi) {
            $query->where('deadline', '>=', $oggi)
                  ->orderBy('deadline', 'asc');
        }])
        ->orderByRaw('CASE WHEN apartment_sponsor.deadline >= ? THEN 0 ELSE 1 END, apartment_sponsor.deadline ASC', [$oggi])
        ->paginate(20);

        //  dd($appartamenti);



        // $data = Apartment::whereHas('sponsors', function($query) {
        //     $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
        // })->get();
        // $dataAp = Apartment::whereDoesntHave('sponsors', function($query) {
        //     $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
        // })->get();


        // // aggiunto parametro 
        // foreach ($data as $key => $value) {
        //     $value['sponsored']= true;
        // }

        // // unione dati sposor + o sponsor
        // foreach ($dataAp as $key => $value) {
        //     $value['sponsored']= false;
        //     $data[]=$value;
        // }
        // $data = collect($data)->paginate($itemsPerPage);

        // dd($data);

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
            $apartment = Apartment::where('slug', $slug)->with('services', 'user.user_data')->firstOrFail();

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