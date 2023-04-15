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
        if (array_key_exists('main_img', $data)) {
            $imgPath = Storage::put('apartments', $data['main_img']);
            $data['main_img'] = $imgPath;
        }

        $data['slug'] = Str::slug($data['title']);
        $existSlug = Apartment::where('slug', $data['slug'])->first();

        $counter = 1;
        $dataSlug = $data['slug'];

        // Aggiungere la possibilità di rimuovere gli spazzi se ci sono e inserire dei trattini, name-repo

        // questa funzione controlla se lo slag esiste già nel database, e in caso esista con questo ciclo while li viene inserito un numero di continuazione 
        while ($existSlug) {
            if (strlen($data['slug']) >= 60) {
                substr($data['slug'], 0, strlen($data['slug']) - 3);
            }
            $data['slug'] = $dataSlug . '-' . $counter;
            $counter++;
            $existSlug = Apartment::where('slug', $data['slug'])->first();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
        $services = Service::all();
        return view('admin.apartments.show', [
            'apartment' => $apartment,
            'services' => $services
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
        // Se esiste già apartment->main_img allora cancella l'immagine
        if ($apartment->main_img) {
            Storage::delete($apartment->main_img);
        }

        // Cancella tutto appartamento
        $apartment->delete();

        return redirect()->route('admin.apartments.index')->with('success', 'L/appartamento è stato cancellato con successo!');
    }
}
