<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreApartmentRequest;
use App\Http\Requests\UpdateApartmentRequest;

// Facades
// Helpers
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;

// Models
use App\Models\User;
use App\Models\Apartment;
use App\Models\Service;
use Termwind\Components\Dd;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // così riconosce utente autenticato
        $user = Auth::user();

        $apartments = Apartment::where('user_id', $user->id)->get();

        return view('admin.apartments.index', [
            'apartments' => $apartments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        // $user= Auth::user();
        return view('admin.apartments.create', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreApartmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApartmentRequest $request)
    {
        $data = $request->validated();

        /* 
        salva l'immagine all'interno di public/storage/apartments
        */
        /*
        if (array_key_exists('main_img', $data)) {
            $imgPath = Storage::put('apartments', $data['main_img']);
            $data['main_img'] = $imgPath;
        }
        */

        // crea uno slug dal titolo e e lo ricerca nel db per controllare che non esiste, in caso esiste la variabile $existSlug ritorna un true e attiva il ciclo while
        $data['slug'] = Str::slug($data['title']);
        $existSlug = Apartment::where('slug', $data['slug'])->first();

        $counter = 1;
        $dataSlug = $data['slug'];

        // questa funzione controlla se lo slag esiste già nel database, e in caso esista con questo ciclo while li viene inserito un numero di continuazione 
        while ($existSlug) {
            if (strlen($data['slug']) >= 60) {
                substr($data['slug'], 0, strlen($data['slug']) - 3);
            }
            $data['slug'] = $dataSlug . '-' . $counter;
            $counter++;
            $existSlug = Apartment::where('slug', $data['slug'])->first();
        }

        // vengono realizate delle cordinate fake per il momento
        $data['latitude'] = '00000';
        $data['longitude'] = '00000';

        // così riconosce utente autenticato
        $user = Auth::user();

        // inseriamo la forekey
        $data['user_id'] = $user->id;

        // salviamo il nuovo apartamento dentro una variabile per poterla utilizzare per inserirla nella tabella ponte
        $newApartment = Apartment::create($data);
        if (array_key_exists('services', $data)) {
            
            foreach ($data['services'] as $service) {
                $newApartment->services()->attach($service);
            }
        }

        return redirect()->route('admin.apartments.show', $newApartment)->with('success', 'Appartamento aggiunto con successo');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', [
            'apartment' => $apartment
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateApartmentRequest  $request
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateApartmentRequest $request, Apartment $apartment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apartment $apartment)
    {
        //
    }
}
