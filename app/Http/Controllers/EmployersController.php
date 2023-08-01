<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveEmployersRequest;
use App\Models\departement;
use App\Models\employers;
use Illuminate\Http\Request;

class EmployersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employersliste = employers::paginate(10);
        return view('pages.administration.liste-employer', compact('employersliste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(employers $Employer, saveEmployersRequest $request)
    {
        dd($Employer);
        try {
            $Employer-> nom = $request->nom;
            $Employer-> prenom = $request->prenom;
            $Employer-> postnom = $request->postnom;
            $Employer-> sexe = $request->sexe;
            $Employer-> age = $request->age;
            $Employer-> contact = $request->contact;
            $Employer-> montant_journalier = $request->montant_journalier;
            $Employer->save();
            return back()->with('message', 'La création de l\'employé s\'est effectué avec succès');

        } catch (\Throwable $e) {
            dd($e);
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
          //La recuperation du departement dans le select de la creation employer se fait ici
          $departementliste = departement::all();
          return view('pages.administration.creer-employer', compact('departementliste'));
    }

    /**
     * Display the specified resource.
     */
    public function show(employers $employers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(employers $employers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, employers $employers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(employers $employers)
    {
        //
    }
}
