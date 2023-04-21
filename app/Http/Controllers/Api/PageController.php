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
            $value['sponsored'] = true;
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
        // apartamenti per pagina
        $itemsPerPage = 20;



        // controllo se arriva il valore per la paginazione
        if(request()->input('items_per_page')
            &&
            (
                request()->input('items_per_page') == 5 ||
                request()->input('items_per_page') == 10 ||
                request()->input('items_per_page') == 20 
            )
        )
        $itemsPerPage = request()->input('items_per_page');

       

            // query per prendere tutti gli id dei appartamenti sponsorizzati
            $idSponsor = Apartment::whereHas('sponsors', function ($query) {
                $query->where('deadline', '>=', Date('Y-m-d H:m:s'));
            })->pluck('id')->toArray();

            // creazione array senza chiavi con gli id all'intenro (serve per poter utilizzare 
            // la funzione array dentro il foreach che inserisce il valore true e false ad ogni appartamento)
            $array = [];
            foreach ($idSponsor as $key => $value) {
                $array[] = $value;
            }

            // usoo di carbon per prendere la data attuale
            $oggi = Carbon::today();

           if(request()->input('address')){
            $address = request()->input('address');
            // $data = Apartment::leftJoin('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')
            // ->select('apartments.*')
            // ->where('apartments.address', 'like', '%'.$address.'%')
            // ->with(['sponsors' => function ($query) use ($oggi) {
            //     $query->where('deadline', '>=', $oggi)
            //         ->orderBy('deadline', 'asc');
            // }])
            // ->orderByRaw('CASE WHEN apartment_sponsor.deadline >= ? THEN 0 ELSE 1 END, apartment_sponsor.deadline ASC', [$oggi])
            // ->paginate($itemsPerPage);
            $data = Apartment::leftJoin('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')
            ->leftJoin('apartment_service', 'apartments.id', '=', 'apartment_service.apartment_id')
            ->select('apartments.*')
            ->where('apartments.address', 'like', '%'.$address.'%')
            ->with(['sponsors' => function ($query) use ($oggi) {
                $query->where('deadline', '>=', $oggi)
                    ->orderBy('deadline', 'asc');
            }, 'services'])
            ->orderByRaw('CASE WHEN apartment_sponsor.deadline >= ? THEN 0 ELSE 1 END, apartment_sponsor.deadline ASC', [$oggi])
            ->paginate($itemsPerPage);
           }else{
            // funzione che prende prima tutti gli apppartamenti con la sponsor attiva e poi tutti gli altri grazie al leftjoin, ordinando come valoree 0 gli sponsor e il resto valore 1
            // $data = Apartment::leftJoin('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')
            //     ->select('apartments.*')
            //     ->with([
            //         'sponsors' => function ($query) use ($oggi) {
            //         $query->where('deadline', '>=', $oggi)
            //             ->orderBy('deadline', 'asc');
            //     }
            //     ])
            //     ->orderByRaw('CASE WHEN apartment_sponsor.deadline >= ? THEN 0 ELSE 1 END, apartment_sponsor.deadline ASC', [$oggi])
            //     ->paginate($itemsPerPage);
            $data = Apartment::leftJoin('apartment_sponsor', 'apartments.id', '=', 'apartment_sponsor.apartment_id')
            ->leftJoin('apartment_service', 'apartments.id', '=', 'apartment_service.apartment_id')
            ->select('apartments.*')
            ->with(['sponsors' => function ($query) use ($oggi) {
                $query->where('deadline', '>=', $oggi)
                    ->orderBy('deadline', 'asc');
            }, 'services'])
            ->orderByRaw('CASE WHEN apartment_sponsor.deadline >= ? THEN 0 ELSE 1 END, apartment_sponsor.deadline ASC', [$oggi])
            ->paginate($itemsPerPage);
           }

            

            // aggiunto parametro true e false per sponsored
            foreach ($data as $key => $value) {
                if (in_array($value['id'], $array))
                    $value['sponsored'] = true;
                else
                    $value['sponsored'] = false;
            }

        if(count($data) > 0) {
            $response = [
                'success' => true,
                'code' => 200,
                'message' => 'OK',
                'apartments' => $data
            ];
        } else {
            $response = [
                'success' => false,
                'code' => 400,
                'message' => 'Non ci sono sono appartamenti'
            ];
        }


        return response()->json($response);
    }

    // show apartments ::slug
    public function show($slug)
    {

        try {
            $apartment = Apartment::where('slug', $slug)->with('services', 'user.user_data', 'views')->withCount('views')->firstOrFail();

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