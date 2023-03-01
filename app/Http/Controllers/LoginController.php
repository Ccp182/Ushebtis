<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __invoke(){
        //if(Auth::check()) return redirect('home');
        //$overview=array();
        //$overview['RES_HMMOVIL']=env('RES_HMMOVIL');
    return view('auth.login'/*,['overview'=>$overview]*/);
    }

    public function login(LoginRequest $req){
        $credentials = $req->getCredentials();
        $remenber = $req->has('remenber') ?true:false;
        if(Auth::attempt($credentials,$remenber)){
            $req->session()->regenerate();
            $user= Auth::getProvider()->retrieveByCredentials($credentials);
            return $this->authenticated($req,$user);
        }else{
            return redirect('login')->withErrors('Correo electronico y/o contraseña incorrecta');
        }

        /*if(!Auth::validate($credentials)){
            return redirect('login');
        }
        $user= Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user);
        return $this->authenticated($req,$user);*/
    }

    public function authenticated($req,$user){
        return redirect()->intended('home');
    }

    public function logout(Request $req){
        $req->session()->flush();
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('login');
    }
}
