<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
// use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

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
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email:dns', 'max:62', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)->numbers()->mixedCase()->uncompromised()],
            // Password harus minimal 8 dengan angka dan huruf kapital minimal 1 serta password tidak "uncompromised"
            // https://laravel.com/docs/8.x/validation#validating-passwords bagian uncompromised
            // sebagai contoh pass dengan 1234567890; password; adminadmin; root;
            // dan berbagai macam seperti itu tidak akan diterima sebagai password
        ])->validate();
        $validator['password'] = Hash::make($validator['password']);

        $user = User::create($validator);

        event(new Registered($user));

        return redirect('/rangkitpc/login')->with('success', 'Registration Successfull and Please Verify Your Account Through Email We Have Sent To Fully Use Our Features');
    }
}
