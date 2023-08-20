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
        $compteurEmployers = employers::all()->count();
        $compteurDepartement = departement::all()->count();
        $compteurSalaire = salaires::all()->count();

        $defaultPaymentDateQuery = null;
        $PaymentNotification = "";

        $currentDate = Carbon::now()->day;
        $defaultPaymentDateQuery = configuration::where('type', 'PAYMENT_DATE')->first();

        if ($defaultPaymentDateQuery) {
            $defaultPaymentDate = $defaultPaymentDateQuery->value;
            $convertPaymentDate = intval($defaultPaymentDate);

            if ($currentDate < $convertPaymentDate) {
                $PaymentNotification = "Le paiement doit avoir lieu ". $defaultPaymentDate ."de ce mois";
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
