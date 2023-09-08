<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
        return view('home', compact('user'));
    }

    public function store(Request $request)
    {
        $response = $request->all();

        $data = [
            'name' => $response['name'],
            'email' => $response['email'],
            'level' => $response['level'],
            'password' => Hash::make($response['password']),
        ];
        User::create($data);
        return redirect('/home');
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/home');
    }
}
