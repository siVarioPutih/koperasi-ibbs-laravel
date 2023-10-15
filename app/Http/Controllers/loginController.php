<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class loginController extends Controller
{
    public function index(){
//        dd(session()->get('email'));
        return view('login');
    }

    public function login(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');

        $getDB = DB::table('admin_koperasi')->where('username', $email)->where('password', $password)->count();
        if($getDB == 1) {
            $request->session()->put('email', $email);
        }
        return redirect('nara/daftar-santri');

//        if(Auth::attempt($credential)) {
//            $request->session()->regenerate();
//            return redirect('nara/daftar-santri');
//        }
        return back()->with(['error' => 'Invalid Credentials']);


    }


}
