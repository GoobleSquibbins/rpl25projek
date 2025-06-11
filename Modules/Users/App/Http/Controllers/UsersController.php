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
        if (!Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            return back()->withErrors([
                'login' => 'Wrong username or password',
            ])->withInput();
        }

        $request->session()->regenerate();
        return redirect()->intended('/main');
    }

    public function users()
    {
        $data = User::all();
        return view('users::users', ['data' => $data]);
    }

    public function show($user_id)
    {
        $data = User::find($user_id);
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

        $user = User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect()->route('user')->with('success', 'User '.$user->name.' added as '.$user->role);
    }

    public function edit($user_id)
    {
        $data = User::find($user_id);
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

        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->role = $request->role;
        $user->telephone = $request->telephone;
        $user->email = $request->email;
        $user->address = $request->address;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user')->with('success', 'User '.$user->name."'s data editted");
    }

    public function delete($user_id)
    {
        $username = User::find($user_id)->name;
        User::destroy($user_id);
        return redirect()->route('user')->with('success', 'User '. $username .' successfully deleted');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Logout Success');
    }
}
