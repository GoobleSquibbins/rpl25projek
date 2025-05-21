<?php

namespace Modules\Users\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Db;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users::login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended('/main');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);
    }

    public function users()
    {
        $data = DB::table('users')->get();
        return view('users::users', ['data' => $data]);
    }

    public function show($user_id)
    {
        $data = DB::table('users')->where('user_id', $user_id)->first();
        return view('users::show', ['data' => $data]);
    }

    public function create()
    {
        return view('users::create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
            'email' => 'required|email',
            'telephone' => 'required|min:12',
            'address' => 'required',

        ]);

        $user = new User([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        $user->save();
        return redirect()->route('user')->with('success', 'Registration complete, you may now login');
    }

    public function edit($user_id)
    {
        $data = DB::table('users')->where('user_id', $user_id)->first();
        return view('users::edit', ['data' => $data]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'pass_confirm' => 'same:password',
            'role' => 'required',
            'telephone' => 'required|min:12',
            'email' => 'required|email',
            'address' => 'required',
        ]);
        if ($request->password == "") {
            # code...
            DB::table('users')->where('user_id', $request->user_id)->update([
                'name' => $request->name,
                'role' => $request->role,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'address' => $request->address,
            ]);
            return redirect()->route('user');
        } else {
            DB::table('users')->where('user_id', $request->user_id)->update([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'role' => $request->role,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'address' => $request->address,
            ]);
            return redirect()->route('user');
        }
    }

    public function delete($user_id)
    {
        DB::table('users')->where('user_id', $user_id)->delete();
        return redirect()->route('user');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
