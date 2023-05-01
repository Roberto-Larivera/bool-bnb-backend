<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


// Facades
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

// Models
use App\Models\User;
use App\Models\User_data;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);
        // calcolo data attuale meno 18 anni per controllare se sei maggiorenne
        // $currentDateMin = Carbon::now()->subYears(-18)->format('Y-m-d');
        $currentDate = date('Y-m-d');
        $currentDateMin = date('Y-m-d', strtotime('-18 years', strtotime($currentDate)));

        $validator = Validator::make($request->all(), [
            'name' => ['nullable', 'string', 'max:50'],
            'surname' => ['nullable', 'string', 'max:50'],
            'date_of_birth' => ['nullable', 'date_format:Y-m-d', 'before_or_equal:' . $currentDateMin],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'date_of_birth.before_or_equal' => 'Devi avere almeno 18 anni per registrarti.'
        ]);
        $validated = $validator->validated();
        // dd($validated);


        // creazione user
        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        
        // creazione user data
        // $user_data = User_data::create([
        $user_data = $user->user_data()->create([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'date_of_birth' => $validated['date_of_birth']
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('http://localhost:5174/login-data?login=true&auth='.$user->id);
        // return redirect(RouteServiceProvider::HOME);
        
    }
}
