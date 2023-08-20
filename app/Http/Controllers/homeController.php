<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\departement;
use App\Models\employers;
use App\Models\salaires;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Auth::user()->roles_id;
        if ($roles == '1') {
            $compteurEmployers = employers::all()->count();
            $compteurDepartement = departement::all()->count();
            $compteurSalaire = salaires::all()->count();
            return view('pages.administration.dashboard', compact('compteurEmployers', 'compteurDepartement', 'compteurSalaire'));
        }if ($roles == '2') {
            return view('pages.users.index');
        }else {
            return view('auth.login');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}
