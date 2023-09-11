<?php

namespace App\Http\Controllers;
use App\Http\Requests\credentials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*User::create([
            'name' => 'jonathan',
            'email' => 'jnthnkabongo@gmail.com',
            'password' => Hash::make('12345'),
            'roles_id' => '1'
        ]);*/
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(credentials $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('redirect'));
        }
        return to_route('index')->withErrors('L\'email n\'est existe pas dans notre base de données')->onlyInput('email');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        Auth::logout();
        return to_route('index')->with('message', 'L\'utilisateir se déconnecter avec succès...');
    }
}
