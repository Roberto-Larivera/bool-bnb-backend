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
use Carbon\Carbon;

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

        foreach ($apartments as $key => $item) {
            $item['full_path_main_img'] = asset('storage/'.$item->main_img); 
        }
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

        // /* 
        // salva l'immagine all'interno di public/storage/apartments
        // */

        // img file
        if (array_key_exists('main_img', $data)) {
            $imgPath = Storage::put('apartments', $data['main_img']);
            $data['main_img'] = $imgPath;
        }


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
        $user = Auth::user();
        $oggi = Carbon::today();


        $apartment['sponsored'] = false;
        
        $boll = $apartment->sponsors()->where('deadline', '>', $oggi)->first();

        if($boll)
            $apartment['sponsored'] = true;


        if ($apartment->user_id == $user->id) {
            $services = Service::all();
            $gallery = $apartment->imageGallery;
            // dd($gallery);

            return view('admin.apartments.show', [
                'apartment' => $apartment,
                'imageGallery' => $gallery,
                'services' => $services
            ]);
        } else {
            return redirect()->route('admin.apartments.index', $apartment->id)->with('warning', 'Ci dispiace, non abbiamo trovato questo appartamento.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apartment  $apartment
     * @return \Illuminate\Http\Response
     */
    public function edit(Apartment $apartment)
    {
        $user = Auth::user();
        if ($apartment->user_id == $user->id) {
            $services = Service::all();
            $apartment['full_path_main_img'] = asset('storage/'.$apartment->main_img);
            return view('admin.apartments.edit', compact('apartment', 'services'));
        } else {
            return redirect()->route('admin.apartments.index', $apartment->id)->with('warning', 'Ci dispiace, non abbiamo trovato questo appartamento.');
        }
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
        $data = $request->validated();
        $titleOld = $apartment->title;
        $descriptionOld = $apartment->description;
        $main_imgOld = $apartment->main_img;
        $servicesOld = $apartment->services()->pluck('id')->toArray();
        $max_guestsOld = $apartment->max_guests;
        $roomsOld = $apartment->rooms;
        $bedsOld = $apartment->beds;
        $bathsOld = $apartment->baths;
        $mqOld = $apartment->mq;
        $addressOld = $apartment->address;
        $priceOld = $apartment->price;
        $visibleOld = $apartment->visible;
        $latitudeOld = $apartment->latitude;
        $longitudeOld = $apartment->longitude;

        // richiesta di rimozione o modifica img file
        $featuredDeleteImage = false;

        // verifica eliminazione o modifica img file
        if (array_key_exists('main_img', $data))
            $featuredDeleteImage = true;

        if(!array_key_exists('services', $data)){
            $data['services']=[];
        }

        if (
            $titleOld == $data['title'] &&
            $descriptionOld == $data['description'] &&
            // img file
            $featuredDeleteImage == false &&
            
            // img url
            // $main_imgOld == $data['main_img'] &&
            $servicesOld == $data['services'] &&
            $max_guestsOld == $data['max_guests'] &&
            $roomsOld == $data['rooms'] &&
            $bedsOld == $data['beds'] &&
            $bathsOld == $data['baths'] &&
            $mqOld == $data['mq'] &&
            $addressOld == $data['address'] &&
            $priceOld == $data['price'] &&
            $visibleOld == $data['visible']
        ) {
            return redirect()->route('admin.apartments.edit', $apartment)->with('warning', 'Non hai effettuato nessuna modifica');
        } else {

            // img file
            if (array_key_exists('main_img', $data)){
                $imgPath = Storage::put('apartments', $data['main_img']);
                $data['main_img'] = $imgPath;
                if ($main_imgOld) {
                    // Controllo se ce un immagine vecchia è la cancello
                    Storage::delete($main_imgOld);
                }
            }

            if (!isset($data['latitude']) && !isset($data['longitude'])) {
                $data['latitude'] = $latitudeOld;
                $data['longitude'] = $longitudeOld;
            }
            

            // verifica se è stato modificato il titolo e in caso viene agiornato lo slug
            if ($titleOld != $data['title']) {
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
            } // fine creazione slug

            // verifica se siste l'array di dati della tabella ponte da sincronizzare
            if (array_key_exists('services', $data)) {

                $apartment->services()->sync($data['services']);
            }
            $apartment->update($data);
            return redirect()->route('admin.apartments.show', $apartment)->with('success', 'Appartamento aggiornato con successo');
        }
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
        // img file
        if ($apartment->main_img) {
            Storage::delete($apartment->main_img);
        }

        // Cancella tutto appartamento
        $apartment->delete();

        return redirect()->route('admin.apartments.index')->with('success', 'L/appartamento è stato cancellato con successo!');
    }
}
