<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();
        return redirect('http://localhost:5174/login-data?login=true&auth=' . $user->id);
        // return redirect()->intended(RouteServiceProvider::HOME);
    }

    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     $user = Auth::user();

    //     // Invia i dati tramite richiesta POST
    //     Http::post('http://localhost:5174/login-data', [
    //         'login' => true,
    //         'auth' => $user->id,
    //     ]);

    //     return redirect('http://localhost:5174');
    // }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('http://localhost:5174/login-data?login=false');
        // return redirect('/');
    }
}
