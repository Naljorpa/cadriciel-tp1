<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

use App\Models\Etudiant;
use App\Models\Ville;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //afficher le formulaire pour créer un etudiant
        $villes = Ville::all();
        return view('auth.create', [
            'villes' => $villes
        ]);
        // return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:2|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/'
            //todo ajouter les validation de addresse et telephone
        ]);

        $user = new User;
        $user->email = $request->email;
        $user->nom = $request->nom;
        $user->password = Hash::make($request->password);
        $user->save();



        $newEtudiant = new Etudiant;
        $newEtudiant->nom = $request->nom;
        $newEtudiant->addresse = $request->addresse;
        $newEtudiant->phone = $request->phone;
        $newEtudiant->email = $request->email;
        $newEtudiant->date_de_naissance = $request->date_de_naissance;
        $newEtudiant->ville_id = $request->ville_id;
        $newEtudiant->id = $user->id;
        $newEtudiant->save();

        return redirect()->back()->withSuccess('User enregistré');
    }

    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);
        $credentials = $request->only('email', 'password');
        if (!Auth::validate($credentials)) :
            return redirect(route('login'))
                ->withErrors(trans('auth.failed'))
                ->withInput();
        //trans regarde dans le dossier de langue
        endif;
        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user, $request->get('remember'));

        return redirect()->intended('dashboard')->withSuccess('Signed in');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function dashboard()
    {


        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect(route('login'))->withErrors('vous n\'êtes pas autorisé à accéder à cette page');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
