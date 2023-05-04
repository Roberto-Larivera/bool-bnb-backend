<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// Facades
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

//models
use App\Models\Apartment;
use App\Models\ImageGallery;

class ImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'path_image' => 'required|image|max:5000',
            'apartment_id' => 'required',
        ]);
        $data = $request->all();


        $user = Auth::user();

        $apartment = Apartment::where('id', $data['apartment_id'])->first();

        if ($apartment->user_id == $user->id) {
            // dd($data, $apartment);

            // /* 
            // salva l'immagine all'interno di public/storage/apartments
            // */
            $gallery = $apartment->imageGallery;
            if (count($gallery) >= 0 || count($gallery) <= 6) {

                $imgPath = Storage::put('apartments', $data['path_image']);

                $data['path_image'] = $imgPath;

                $apartment->imageGallery()->create($data);
                return redirect()->route('admin.apartments.show', $apartment)->with('success', 'Immagine aggiunta con successo');
            } else {
                return redirect()->route('admin.apartments.show', $apartment)->with('warning', 'Ci dispiace, non puoi inserire più di 5 immagini.');
            }
        } else {
            return redirect()->route('admin.apartments.index')->with('warning', 'Ci dispiace, pagina non trovata.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageGallery $image_gallery)
    {
        $user = Auth::user();

        $apartment = Apartment::where('id', $image_gallery->apartment_id)->first();

        if ($apartment->user_id == $user->id) {

            $gallery = $apartment->imageGallery;
            if (count($gallery) >= 0 || count($gallery) <= 6) {

                // img file
               
                Storage::delete($image_gallery->path_image);
                
                // Cancella tutto appartamento
                $image_gallery->delete();

                return redirect()->route('admin.apartments.show', $apartment)->with('success', 'Immagine eliminata con successo');
            } else {
                return redirect()->route('admin.apartments.show', $apartment)->with('warning', 'Ci dispiace, non sono state trovate img.');
            }
        } else {
            return redirect()->route('admin.apartments.index')->with('warning', 'Ci dispiace, pagina non trovata.');
        }
    }
}
