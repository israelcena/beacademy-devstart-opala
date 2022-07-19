<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\FullName;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $request->validate([
                'name' => ['required', 'max:255', new FullName],
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:8|confirmed',
                'cpf' => 'required|max:14|unique:users|cpf',
                'birth_date' => 'required|date',
                'phone' => 'required|max:15|celular_com_ddd',
                'place' => 'required|max:255',
                'residence_number' => 'required|max:255',
                'city' => 'required|max:255',
                'district' => 'required|max:255',
                'country' => 'required|max:255',
                'cep' => 'required|max:255',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'cpf' => $request->cpf,
            'birth_date' => $request->birth_date,
            'cep' => $request->cep,
            'country' => $request->country,
            'place' => $request->place,
            'city' => $request->city,
            'district' => $request->district,
            'residence_number' => $request->residence_number,
            'phone' => $request->phone,
            'is_admin' => false,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success', 'Usuário criado com sucesso!');
    }
}
