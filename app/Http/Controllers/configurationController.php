<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeConfiguration;
use App\Models\configuration;
use Exception;
use Illuminate\Http\Request;

class configurationController extends Controller
{
    /**
     * Display a listing of the resource.
     * php artisan migrate:refresh --step=1
     */
    public function index()
    {
        $configurationliste = configuration::latest()->paginate('10');
        return view('pages.administration.liste-configuration', compact('configurationliste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(storeConfiguration $request)
    {
        try {
            Configuration::create($request->all());
            return redirect()->route('liste-configuration')->with('message', 'La configuration a été créer');
        } catch (Exception $e) {
            dd($e);
            throw new Exception('Erreur lors de la création de la configuration');
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('pages.administration.creer-configuration');
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
    public function destroy(configuration $config)
    {
        try {
            $config->delete();
            return redirect()->route('liste-configuration')->with('Message', 'La configuration a été supprimer');
        } catch (Exception $e) {
            dd($e);
            throw new Exception('Erreur lors de la suppression de la configuration');
        }
    }
}
