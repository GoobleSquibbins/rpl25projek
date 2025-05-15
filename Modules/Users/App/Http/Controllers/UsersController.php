<?php

namespace Modules\Users\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Db;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users::login');
    }

    public function users()
    {
        $data = DB::table('users')->get();
        return view('users::users', ['data' => $data]);
    }

    public function create()
    {
        return view('users::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required|unique:tb_user',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'email' => 'required',
            'telephone' => 'required|min:12',
            'address' => 'required',

        ]);

        $user = new User([
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        $user->save();

        return redirect()->route('user')->with('success', 'Registration complete, you may now login');
    }
}
