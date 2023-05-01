<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Models
use App\Models\User_data;
use App\Models\User;
// Facades
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_data = User_data::where('user_id', $user->id)->first();

        return view('admin.user_datas.index', [
            'user_data' => $user_data,
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
     * @param  \App\Http\Requests\StoreUser_dataRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_data  $user_data
     * @return \Illuminate\Http\Response
     */
    public function show(User_data $user_data)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_data  $user_data
     * @return \Illuminate\Http\Response
     */
    public function edit(User_data $user_data)
    {
        $user = Auth::user();
        $user_data = User_data::where('user_id', $user->id)->first();

        return view('admin.user_datas.edit', [
            'user_data' => $user_data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_dataRequest  $request
     * @param  \App\Models\User_data  $user_data
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_data $user_data)
    {
        $nameOld = $user_data->name;
        $surnameOld = $user_data->surname;
        $date_of_birthOld = $user_data->date_of_birth;

        // calcolo data attuale meno 18 anni per controllare se sei maggiorenne
        $currentDate = date('Y-m-d');
        $currentDateMin = date('Y-m-d', strtotime('-18 years', strtotime($currentDate)));

        // Validazione dati
        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'string', 'max:50'],
            'surname' => ['nullable', 'string', 'max:50'],
            'date_of_birth' => ['nullable', 'date_format:Y-m-d', 'before_or_equal:' . $currentDateMin]
        ], [
            'date_of_birth.before_or_equal' => 'Devi avere almeno 18 anni per registrarti.'
        ]);

        $validated = $validator->validated();

        $user = Auth::user();

        

        if ($request->has('profile_img')) {
            // Aggiornamento dell'immagine del profilo
            if ($user->id == $user_data->user->id) {
                $user_data->profile_img = $request->input('profile_img');
                $user_data->save();
                return redirect()->route('admin.user_datas.index')->with('success', 'Immagine di profilo caricata con successo!');
            } else {
                return redirect()->route('admin.user_datas.index', $user_data->id)->with('warning', 'Ci dispiace, si è verificato un problema.');
            }
        } else {
            if(
                $nameOld == $validated['name'] &&
            $surnameOld == $validated['surname'] &&
            $date_of_birthOld == $validated['date_of_birth']
            ){
                return redirect()->route('admin.user_datas.index', $user_data)->with('warning', 'Non hai effettuato nessuna modifica');
            }else{

            // Aggiornamento delle informazioni personali
            $user_data->fill($validated);
            $user_data->save();
            return redirect()->route('admin.user_datas.index')->with('success', 'Informazioni personali aggiornate con successo!');
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_data  $user_data
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_data $user_data)
    {
        //
    }
}
