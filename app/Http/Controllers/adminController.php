<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveAdmins;
use App\Models\ResetCodePassword;
use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\SendEmailToAdministratorNotification;
use Exception;
//use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Hash;


class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $administrateurliste = User::with('roles')->paginate(10);
        return view('pages.utilisateur.liste-administrateurs', compact('administrateurliste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(saveAdmins $request)
    {
        try {
            //Création de l'administrateur
            $utilisateur = new User();
            $utilisateur->name = $request->name;
            $utilisateur->email = $request->email;
            $utilisateur->password = Hash::make('default');
            $utilisateur->roles_id = value('2') ;
            $utilisateur->save();

            if ($utilisateur) {
               try {
                ResetCodePassword::where('email', $utilisateur->email)->delete();
                $code = rand(1000, 4000);

                $data = [
                    'code' =>$code,
                    'email' =>$utilisateur->email
                ];
                ResetCodePassword::create($data);
                  //Envoie d'un e-mail pour que ce dernier confirme son compte
                Notification::route('mail', $utilisateur->email)->notify
                (new SendEmailToAdministratorNotification($code, $utilisateur->email));

                return redirect()->route('liste-administrateurs');
            } catch (\Throwable $e) {
                dd($e);
                throw new Exception('Une erreur est survenue lors de l\'envoi du mail');
               }
            }

        } catch (\Throwable $e) {
            dd($e);
            //throw new Exception('Une erreur est survenue...');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return view('pages.utilisateur.créer-administrateur');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $admin)
    {
        return view('pages.utilisateur.afficher-administrateur', compact('admin'));
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
