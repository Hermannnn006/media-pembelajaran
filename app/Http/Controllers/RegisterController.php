<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function store(Request $request)
    {
        //menangkap data input
       //return $request->all();
           $validatedData = $request->validate([
               'name' => 'required|max:50',
               'username' => ['required', 'min:3', 'max:50', 'unique:users'],
               'email' => 'required|email|unique:users',
               'password' => 'required|min:5|max:255'
           ]);
   
           //$validatedData['password'] = bcrypt($validatedData['password']);
           $validatedData['password'] = Hash::make($validatedData['password']);
   
           User::create($validatedData);
   
          // $request->session()->flash('success','Daftar Berhasil, Silahkan Login!!!');
           return redirect('/login')->with('success','Daftar Berhasil, Silahkan Login!!!');
    }
}
