<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;



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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $date_of_birth = $request-> date_of_birth;
        if (strtotime($date_of_birth) > time()) {
            return redirect()->back()->withErrors(['date_of_birth' => 'La data di nascita non può essere nel futuro.'])->withInput();
        }
    
        // Calcolo dell'età
        $age = date_diff(date_create($date_of_birth), date_create('today'))->y;
    
        // Controllo che l'età sia almeno 18 anni
        if ($age < 18) {
            return redirect()->back()->withErrors(['date_of_birth' => 'Devi avere almeno 18 anni per registrarti.'])->withInput();
        } else if ($age > 100) {
            return redirect()->back()->withErrors(['date_of_birth' => 'Non puoi avere più di 100 anni per registrarti.'])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
