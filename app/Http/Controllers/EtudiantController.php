<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // afficher tous les étudiants
        $etudiants = Etudiant::all();
        return view(
            'etudiant.index',
            [
                'etudiants' => $etudiants
            ]
        ); //renvoie la vue avec les etudiants}
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
        return view('etudiant.create', [
            'villes' => $villes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $newEtudiant = Etudiant::create(
            [
                'nom' => $request->nom,
                'addresse' => $request->addresse,
                'phone' => $request->phone,
                'email' => $request->email,
                'date_de_naissance' => $request->date_de_naissance,
                'ville_id' => $request->ville_id,
            ]
        );

        return redirect(route('etudiant.show', $newEtudiant->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show(Etudiant $etudiant)
    {
        //afficher les détails d'un étudiant
        //ce qui se passe dans le background
        //select * from etudiants where id = $etudiant

        return view(
            'etudiant.show',
            [
                'etudiant'  => $etudiant
            ]
        ); //renvoie la vue avec le détail}

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudiant $etudiant)
    {
        //afficher le formulaire pour modifier le detail de l'etudiant
        $ville = Ville::all();
        return view('etudiant.edit', [
            'etudiant' => $etudiant,
            'villes' => $ville
        ]); //renvoie la vue d'édition avec la publication

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $etudiant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $etudiant)
    {
        //
    }
}
