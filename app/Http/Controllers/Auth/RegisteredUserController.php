<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $nik = $request->nik;
        $arnik = str_split($nik);
        $kodedaerah = '351204';
        $validasikodedaerah = $arnik[0].$arnik[1].$arnik[2].$arnik[3].$arnik[4].$arnik[5];

        if($validasikodedaerah != $kodedaerah){
            return back()->withInput()->withErrors(['NIK Anda tidak valid!!']);
        }

        $request->validate([
            'nik' => 'required|string|digits:16|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:12',
            'password' => 'required|string|confirmed|min:8',
        ]);

        Auth::login($user = User::create([
            'nik' => $nik,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),

        ]));

        event(new Registered($user));

        return redirect(RouteServiceProvider::HOME);
    }
}
