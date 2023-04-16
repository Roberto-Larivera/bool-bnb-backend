<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Requests\StoreUser_dataRequest;
use App\Http\Requests\UpdateUser_dataRequest;
use App\Models\User_data;

// Facades
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
        $profile = User_data::where('user_id', $user->id)->first();

        return view('admin.users.index', [
            'profile' => $profile,
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
    public function store(StoreUser_dataRequest $request)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUser_dataRequest  $request
     * @param  \App\Models\User_data  $user_data
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUser_dataRequest $request, User_data $user_data)
    {
        //
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
