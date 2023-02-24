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
            'nom' => 'required|min:2|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:2|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/',
            'addresse' => 'required',
            'phone' => 'required|regex:/^\(\d{3}\) \d{3}-\d{4}$/',
            'date_de_naissance' => 'required|date_format:"Y-m-d"|before:today',
            'ville_id' => 'required'
        ]);

        $user = User::create(
            [
                'nom' => $request->nom,
                'addresse' => $request->address,
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
            ]
        );

        $newEtudiant = Etudiant::create(
            [
                'user_id' => $user->id,
                'nom' => $request->nom,
                'addresse' => $request->addresse,
                'phone' => $request->phone,
                'email' => $request->email,
                'date_de_naissance' => $request->date_de_naissance,
                'ville_id' => $request->ville_id,
            ]
        );

        return redirect()->back()->withSuccess(trans('lang.rSuccess'));
    }

    /**
     * Authentification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authentication(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:2|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/'
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

        return redirect()->intended('dashboard')->withSuccess(trans('lang.signIn'));
    }

    /**
     * Logout
     */
    
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

        return redirect(route('login'))->withErrors(trans('lang.notAuth'));
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
