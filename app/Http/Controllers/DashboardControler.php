<?php

namespace App\Http\Controllers;

use App\Models\configuration;
use App\Models\departement;
use App\Models\employers;
use App\Models\salaires;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Les compteurs sur le Dashboard
        $compteurEmployers = employers::all()->count();
        $compteurDepartement = departement::all()->count();
        $compteurSalaire = salaires::all()->count();

        $defaultPaymentDateQuery = null; //Initialisation de la date de paiement...
        $PaymentNotification = ""; //Initialisation du message de rappel de la date de paiement

        $currentDate = Carbon::now()->day; // Recuperation de la Date juste par Larvel
        $defaultPaymentDateQuery = configuration::where('type', 'PAYMENT_DATE')->first(); //Requete de selection de la date de paiement

        if ($defaultPaymentDateQuery) { //Condition de la date de paiement
            $defaultPaymentDate = $defaultPaymentDateQuery->value; //Recuperation de la valeur de la date de apiement
            $convertPaymentDate = intval($defaultPaymentDate); //Conversion de la date de paiement

            if ($currentDate < $convertPaymentDate) { //Condition sur la date d'echance du paiement 
                $PaymentNotification = "Le paiement aura lieu le " . $defaultPaymentDate . " de ce mois ";
            }else {
                $nextMonth = Carbon::now()->addMonth();
                $nextMonthName = $nextMonth->format('F');

                $PaymentNotification = "Le paiement du mois prochain aura lieu le ". $defaultPaymentDate . " du mois de " . $nextMonthName;
            }
        }

        return view('pages.administration.dashboard', compact('compteurEmployers','compteurDepartement','compteurSalaire','PaymentNotification'));
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
