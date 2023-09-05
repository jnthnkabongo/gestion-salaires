<?php

namespace App\Http\Controllers;

use App\Models\payment;
use App\Models\salaires;
use App\Models\configuration;
use App\Models\employers;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Exception;

class SalairesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $defaultPaymentDateQuery = configuration::where('type', 'PAYMENT_DATE')->first(); //Requete de selection de la date de paiement
        $defaultPaymentDate = $defaultPaymentDateQuery->value; //Recuperation de la valeur de la date de apiement
        $convertPaymentDate = intval($defaultPaymentDate);
        $date_jour = date('d'); //Variable qui recupere la date du jour
        $ispaymentday = false; //inistialisation de la variable

        if ($date_jour == $convertPaymentDate) {
          $ispaymentday = true;
        }


        $salairesliste = payment::paginate('10');
        return view('pages.administration.liste-salaires', compact('salairesliste','ispaymentday'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(payment $salaire)
    {
      try {
        $FullPaymentInfo = payment::with('employers')->find($salaire->id);

        return view('pages.administration.facture', compact('FullPaymentInfo'));
      } catch (Exception $th) {
        throw new Exception('message' , 'Une erreur est survenue au moment du telechargement');

      }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $mois = ['JANUARY' => 'JANVIER',
                'FEBRUARY'=>'FEVRIER',
                'MARCH'=>'MARS',
                'APRIL'=>'AVRIL',
                'MAY'=>'MAI',
                'JUNE'=>'JUIN',
                'JULY'=>'JUILLET',
                'AUGUST'=>'AOUT',
                'SEPTEMBER'=>'SEPTEMBRE',
                'OCTOBER'=>'OCTOBRE',
                'NOVEMBER'=>'NOVEMBRE',
                'DECEMBER'=>'DECEMBRE'
            ];

        //Initialisation des mois
        $initialMois = strtoupper(Carbon::now()->formatLocalized('%B'));
        //Le mois en français
        $initialMoisFR = $mois[$initialMois] ?? '';
        //Initialiser les annees
        $initialYear = Carbon::now()->format('Y');

        $employers = employers::whereDoesntHave('payments', function($query)
        use ($initialMoisFR, $initialYear){
            $query->where('month', '=', $initialMoisFR)
                ->where('years', '=', $initialYear);
        })->get();

        //Verification si le paiement a ete deja effectuer pour le mois en cours
        if ($employers->count() === 0) {
            return redirect()->back()->with('message', 'Tous vos employés ont été payés pour ce mois ' . $initialMoisFR);
        }


        // Faire  les paiements pour ces employers
        foreach ($employers as $paiement) {
            $etaitpayer = $paiement->payments()->where('month', '=', $initialMoisFR)
                    ->where('years', '=' , $initialYear)->exists();

            if (!$etaitpayer) {
                $salaire = $paiement->montant_journalier * 31;

                $payment = new payment([
                    'reference' => strtoupper(Str::random(10)),
                    'employers_id' => $paiement->id,
                    'amount' => $salaire,
                    'date' => now(),
                    'validate_date' => now(),
                    'status' => 'SUCCESS',
                    'month' => $initialMoisFR,
                    'years' => $initialYear,
                ]);

                $payment->save();
            }
        }
        //rediriger les users
        return redirect()->back()->with('message' , 'Le paiement a réussi pour ce mois de' .$initialMoisFR);
    }

    /**
     * Display the specified resource.
     */
    public function show(salaires $salaires)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(salaires $salaires)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, salaires $salaires)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(salaires $salaires)
    {
        //
    }
}
