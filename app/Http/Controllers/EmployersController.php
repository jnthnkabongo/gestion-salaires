<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveEmployersRequest;
use App\Models\departement;
use App\Models\employers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployersController extends Controller
{
    /**
     * Display a listing of the resource.
     * orderByDesc('id')->
     */
    public function index()
    {
        $employersliste = employers::with('departement')->paginate(10);
        return view('pages.administration.liste-employer', compact('employersliste'));
       /* $employersliste = DB::table('departements')->join('employers','employers.departement_id', '=', 'departements.id')->orderByDesc('id_em')->paginate(10);
        return view('pages.administration.liste-employer', compact('employersliste'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(employers $Employer, saveEmployersRequest $request)
    {
        try {
            $Employer->departement_id = $request->departement_id;
            $Employer->roles_id = $request->roles_id;
            $Employer-> nom = $request->nom;
            $Employer-> prenom = $request->prenom;
            $Employer-> postnom = $request->postnom;
            $Employer-> email = $request->email;
            $Employer-> sexe = $request->sexe;
            $Employer-> age = $request->age;
            $Employer-> contact = $request->contact;
            $Employer-> montant_journalier = $request->montant_journalier;
            $Employer->save();
            //return redirect()->route('liste-employer')->with('success_message', 'La création de l\'employé s\'est effectué avec succès');
            return back()->with('success_message', 'La création de l\'employé s\'est effectué avec succès');

        } catch (\Throwable $e) {
            dd($e);
        }
        /*$query = employers::create($request->all);
        if ($query){
            return redirect('administration.liste-employer')->with('success_message', 'Employer ajouter');
        }*/
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
    public function show(employers $resultat)
    {
       // $resultat = DB::table('employers')->join('departements','employers.departement_id', '=', 'departements.id');
        return view('pages.administration.modifier-employer', compact('resultat'));
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
