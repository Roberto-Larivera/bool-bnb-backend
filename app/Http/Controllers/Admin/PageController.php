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
    public function dashboard(Request $request)
    {

        $user = Auth::user();
        $allApartments = Apartment::where('user_id', $user->id)->get();

        if($request->has('selectApartment')){
            $apartments = Apartment::where('id', $request->input('selectApartment'))
                      ->where('user_id', $user->id)
                      ->get();
        }
        else{
            $apartments = Apartment::where('user_id', $user->id)->get();
        }




        //Controlli Views
        if ($request->has('month')) {
            $selectedMonth = $request->input('month');
            $totalViews = 0;
            foreach ($apartments as $apartment) {
                $totalViews += $apartment->views()->whereMonth('created_at', '=', $selectedMonth)->count();
            }
        } else {
            $totalViews = 0;
            foreach ($apartments as $apartment) {
                $totalViews += $apartment->views()->count();
            }
        }

        $viewsByMonth = array_fill(0, 12, 0);
        foreach ($apartments as $apartment) {
            $views = $apartment->views()->whereYear('created_at', '=', date('Y'))->get();
            foreach ($views as $view) {
                $month = $view->created_at->format('m') - 1; // sottrae 1 per ottenere l'indice dell'array
                $viewsByMonth[$month]++;
            }
        }

        //Controlli messaggi
        $totalMessages = 0;
        foreach ($apartments as $apartment) {
            $totalMessages += $apartment->messages()->count();
        }



        return view('admin.dashboard', [
            'apartments' => $apartments,
            'totalViews' => $totalViews,
            'totalMessages' => $totalMessages,
            'viewsByMonth' => $viewsByMonth,
            'allApartments' => $allApartments
        ]);
    }



    // public function dashboard(Request $request)
    // {
    //     $user = Auth::user();
    //     $apartments = Apartment::where('user_id', $user->id)->get();

    //     //Controlli Views
    //     $selectedApartment = null;
    //     if ($request->has('selectApartment')) {
    //         $selectedApartment = Apartment::find($request->input('selectApartment'));
    //     }

    //     $totalViews = 0;
    //     if ($selectedApartment) {
    //         $totalViews = $selectedApartment->views()->count();
    //     } else {
    //         if ($request->has('month')) {
    //             $selectedMonth = $request->input('month');
    //             foreach ($apartments as $apartment) {
    //                 $totalViews += $apartment->views()->whereMonth('created_at', '=', $selectedMonth)->count();
    //             }
    //         } else {
    //             foreach ($apartments as $apartment) {
    //                 $totalViews += $apartment->views()->count();
    //             }
    //         }
    //     }

    //     $viewsByMonth = array_fill(0, 12, 0);
    //     foreach ($apartments as $apartment) {
    //         $views = $apartment->views()->whereYear('created_at', '=', date('Y'))->get();
    //         foreach ($views as $view) {
    //             $month = $view->created_at->format('m') - 1; // sottrae 1 per ottenere l'indice dell'array
    //             $viewsByMonth[$month]++;
    //         }
    //     }

    //     //Controlli messaggi
    //     $totalMessages = 0;
    //     foreach ($apartments as $apartment) {
    //         $totalMessages += $apartment->messages()->count();
    //     }

    //     return view('admin.dashboard', [
    //         'apartments' => $apartments,
    //         'totalViews' => $totalViews,
    //         'totalMessages' => $totalMessages,
    //         'viewsByMonth' => $viewsByMonth
    //     ]);
    // }
}
