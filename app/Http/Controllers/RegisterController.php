<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use App\Models\KasKeluar;
use App\Models\KasMasuk;
use App\Models\LaporanKas;

class RegisterController extends Controller
{
    public function index(){
        return view('account.register', []);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'user_name' => ['required', 'min:3', 'max:255', 'unique:users'],
            'password' => 'required|min:4'
        ]);

        $validated['password'] = bcrypt($validated['password']);
        User::create($validated);

        return redirect('/login')->with('success', 'Registration Successfull pleas Login!');

    }
}
