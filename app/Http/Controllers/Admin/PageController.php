<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//models

use App\Models\Apartment;
use App\Models\View;
use App\Models\Message;

class PageController extends Controller
{
    public function dashboard()
    {

        $user = Auth::user();
        $apartments = Apartment::where('user_id', $user->id)->get();

        $totalViews = 0;
        foreach ($apartments as $apartment) {
            $totalViews += $apartment->views()->count();
        }

        $totalMessages = 0;
        foreach ($apartments as $apartment) {
            $totalMessages += $apartment->messages()->count();
        }

        return view('admin.dashboard', [
            'apartments' => $apartments,
            'totalViews' => $totalViews,
            'totalMessages' => $totalMessages
        ]);
    }
}
