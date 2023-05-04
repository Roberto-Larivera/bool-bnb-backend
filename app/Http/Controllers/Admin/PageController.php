<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
// Facades
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

//models
use App\Models\Apartment;

class PageController extends Controller
{
    public function dashboard(Request $request)
    {

        $user = Auth::user();
        $allApartments = Apartment::where('user_id', $user->id)->get();

        if ($request->has('selectApartment')) {
            if ($request->input('selectApartment') == 'tutti' || $request->input('selectApartment') == '') {
                $apartments = Apartment::where('user_id', $user->id)->get();
            } else {
                $apartments = Apartment::where('id', $request->input('selectApartment'))
                    ->where('user_id', $user->id)
                    ->get();
            }
        } else {
            $apartments = Apartment::where('user_id', $user->id)->get();
        }




        //Controlli Views
        if ($request->has('month')) {
            if ($request->input('month') == '' || $request->input('month') == 'tutti') {
                $totalViews = 0;
                $totalMessages = 0;
                foreach ($apartments as $apartment) {
                    $totalMessages += $apartment->messages()->count();
                }
                foreach ($apartments as $apartment) {
                    $totalViews += $apartment->views()->count();
                }
            } else {
                $selectedMonth = $request->input('month');
                $totalViews = 0;
                $totalMessages = 0;
                foreach ($apartments as $apartment) {
                    $totalMessages += $apartment->messages()->whereMonth('created_at', '=', $selectedMonth)->count();
                }
                foreach ($apartments as $apartment) {
                    $totalViews += $apartment->views()->whereMonth('created_at', '=', $selectedMonth)->count();
                }
            }
        } else {
            $totalViews = 0;
            $totalMessages = 0;
            foreach ($apartments as $apartment) {
                $totalMessages += $apartment->messages()->count();
            }
            foreach ($apartments as $apartment) {
                $totalViews += $apartment->views()->count();
            }
        }

        //Tutte le visualizzazioni per mese
        $viewsByMonth = array_fill(0, 12, 0);
        foreach ($apartments as $apartment) {
            $views = $apartment->views()->whereYear('created_at', '=', date('Y'))->get();
            foreach ($views as $view) {
                $month = $view->created_at->format('m') - 1;
                $viewsByMonth[$month]++;
            }
        }

        //Tutti i messaggi per mese
        $messagesByMonth = array_fill(0, 12, 0);
        foreach ($apartments as $apartment) {
            $messages = $apartment->messages()->whereYear('created_at', '=', date('Y'))->get();
            foreach ($messages as $message) {
                $month = $message->created_at->format('m') - 1;
                $messagesByMonth[$month]++;
            }
        }


        return view('admin.dashboard', [
            'apartments' => $apartments,
            'totalViews' => $totalViews,
            'totalMessages' => $totalMessages,
            'viewsByMonth' => $viewsByMonth,
            'messagesByMonth' => $messagesByMonth,
            'allApartments' => $allApartments,
            'request' => $request
        ]);
    }
}
