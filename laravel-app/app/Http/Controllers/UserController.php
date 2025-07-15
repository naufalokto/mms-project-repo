<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register (Request $request) {

        $incomingFields = $request->validate([
            'name' => 'required|min:3',
            'phone' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',

        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $pengguna = Pengguna::create([
            'nama' => $incomingFields['name'],
            'username' => $incomingFields['username'],
            'no_hp' => $incomingFields['phone'],
            'password' => $incomingFields['password'],
            'peran' => 'cust', 
        ]);
        Auth::login($pengguna);

        return redirect('/login');
    }
}