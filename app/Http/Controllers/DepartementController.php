<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveDepartementsRequest;
use App\Models\departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departementsliste = departement::orderByDesc('id_dep')->paginate(10);
        return view('pages.administration.liste-departement', compact('departementsliste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(departement $Departement, saveDepartementsRequest $request)
    {
        try {

            $Departement-> nom = $request->nom;
            $Departement-> responsable = $request->responsable;
            $Departement->save();
            return back()->with('message', 'Le département a êté créer avec succès !!');
            //return redirect()->route('liste-departement');
        } catch (\Exception $e) {
            dd($e);
        }
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
    public function show(departement $departement)
    {
        return view('pages.administration.creer-departement');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(departement $result)
    {
        return view('pages.administration.modifier-departement', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, departement $result)
    {
        try {
            $result-> nom = $request->nom;
            $result-> responsable = $request->responsable;
            $result->update();
            return back()->with('message', 'La modification...');
        } catch (\Throwable $e) {
            dd($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(departement $result)
    {
        try {
            $result->delete();
            return back()->with('message', 'Le département a été supprimer avec succès!!');
        } catch (\Throwable $e) {
            //throw $th;
        }
    }
}
