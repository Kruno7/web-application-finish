<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indexAdmin()
    {
        return view('admin.profile.index');
    }

    public function indexRenter ()
    {
        return view('renter.profile.index');
    }

    public function indexUser ()
    {
        return view('user.profile.index');
    }

    public function update (Request $request)
    {
        $user = Auth::user();

        $user->first_name =  $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        $user->save();
        return redirect()->back()->with('success', 'Uspjesno ste azurirali profil');

    }
}
