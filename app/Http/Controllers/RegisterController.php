<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\HMUserAdminAlerts;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __invoke(){
        return view('auth.register');
    }
    public function register(RegisterRequest $req){
        $user = User::create($req->validated());
        /* HMUserAdminAlerts::create([
            'name' => $req['name'],
            'email' => $req['email'],
            'password' => Hash::make($req['password']),
        ]);*/
        //Auth::login($user);
        return redirect(route('login'))->with('success','Usuario creado correctamente.');
    }
}
