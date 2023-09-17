<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\departement;
use App\Models\employers;
use App\Models\salaires;
use Carbon\Carbon;
use App\Models\User;
use App\Models;
use App\Models\configuration;

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
            $compteurUsers = User::all()->count();
            $defaultPaymentDateQuery = null;
            $PaymentNotification = "";

            $currentDate = Carbon::now()->day;
            $defaultPaymentDateQuery = configuration::where('type', 'PAYMENT_DATE')->first();

            if ($defaultPaymentDateQuery) {
                $defaultPaymentDate = $defaultPaymentDateQuery->value;
                $convertPaymentDate = intval($defaultPaymentDate);

                if ($currentDate < $convertPaymentDate) {
                    $PaymentNotification = "Le paiement doit avoir lieu ". $defaultPaymentDate ." de ce mois";
                }else {
                    $nextMonth = Carbon::now()->addMonth();
                    $nextMonthName = $nextMonth->format('F');

                    $PaymentNotification = "Le paiement du mois prochain aura lieu le ". $defaultPaymentDate . " du mois de " . $nextMonthName;
                }
            }
            return view('pages.administration.dashboard', compact('compteurEmployers', 'compteurDepartement', 'compteurSalaire','PaymentNotification','compteurUsers'));
        }if ($roles == '2') {

            $compteurEmployers = employers::all()->count();
            $compteurDepartement = departement::all()->count();
            $compteurSalaire = salaires::all()->count();
            $compteurUsers = User::all()->count();
            $defaultPaymentDateQuery = null;
            $PaymentNotification = "";

            $currentDate = Carbon::now()->day;
            $defaultPaymentDateQuery = configuration::where('type', 'PAYMENT_DATE')->first();

            if ($defaultPaymentDateQuery) {
                $defaultPaymentDate = $defaultPaymentDateQuery->value;
                $convertPaymentDate = intval($defaultPaymentDate);

                if ($currentDate < $convertPaymentDate) {
                    $PaymentNotification = "Le paiement doit avoir lieu ". $defaultPaymentDate ." de ce mois";
                }else {
                    $nextMonth = Carbon::now()->addMonth();
                    $nextMonthName = $nextMonth->format('F');

                    $PaymentNotification = "Le paiement du mois prochain aura lieu le ". $defaultPaymentDate . " du mois de " . $nextMonthName;
                }
            }
            $administrateurliste = User::with('roles')->paginate(10);
            return view('pages.utilisateur.dashboard-user', compact('compteurEmployers', 'compteurDepartement', 'compteurSalaire','PaymentNotification','compteurUsers','administrateurliste'));
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
