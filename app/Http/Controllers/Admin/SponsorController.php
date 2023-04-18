<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use App\Models\Sponsor;
use App\Models\User;
use App\Models\Apartment;


class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->query('apartment_id');

        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', [
            'sponsors' => $sponsors,
            'apartment_id' => $id
        ]);
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
     * @param  \App\Http\Requests\StoreSponsorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSponsorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment, Sponsor $sponsor, Request $request)
    {

        $id = $request->query('apartment_id');

        $user = Auth::user();

        if ($id == null) {

            $apartments = Apartment::where('user_id', $user->id)->get();

            return view('admin.sponsors.show', [
                'apartments' => $apartments,
                'sponsor' => $sponsor,
            ]);

            
        }
        else{

            $apartments = Apartment::findOrFail($id);

            $sponsor = Sponsor::findOrFail($sponsor->id);

            if (Auth::user()->id !== $apartments->user_id) {
                return redirect()->back()->withErrors(['message' => 'Non sei autorizzato a visualizzare questa pagina']);
            }

            return view('admin.sponsors.show', [
                'apartment' => $apartments,
                'sponsor' => $sponsor,
            ]);

        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function edit(Sponsor $sponsor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSponsorRequest  $request
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sponsor  $sponsor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }
}
