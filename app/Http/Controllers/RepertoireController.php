<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Repertoire;
use Illuminate\Support\Facades\Storage;

class RepertoireController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // afficher tous les articles du blog
        if (Auth::check()) {
            $repertoires = Repertoire::select()->paginate(5);;
            return view('repertoire.index', ['repertoires' => $repertoires]);
        }
        return redirect(route('login'))->withErrors(trans('lang.notAuth'));

        // return $blogs[0]->title;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //afficher le formulaire pour créer un article de blog

        return view('repertoire.create');
    }


     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf,zip,doc,docx|max:10240', // maximum 10MB
        ]);

        // source du code: chatgpt
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $timestamp = time();
        $file->storeAs('public/uploads', $timestamp . $filename);
        $link = $timestamp . $filename;

        $newDoc = Repertoire::create(
            [
                'title' => $request->title,
                'title_fr' => $request->title_fr,
                'location' => $link,
                'user_id' => Auth::user()->id,
            ]
        );
        // Optionally, you can store the file information in a database table
        // with the user who uploaded it and other metadata.

        return back()->with('success', trans('lang.dSuccess'));
    }

     /**
     * Fonction de downlod
     *
     * @param  \Illuminate\Http\Request  $id
     * @return \Illuminate\Http\Response
     */
    //source solution chat gpt
    public function download($id)
    {
        $repertoire = Repertoire::findOrFail($id);
        $path = Storage::path('public/uploads/' . $repertoire->location);
        return response()->download($path);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $Forum
     * @return \Illuminate\Http\Response
     */
    public function show(Repertoire $repertoire)
    {
        //afficher un article de blog


        return view(
            'repertoire.show',
            [
                'repertoire'  => $repertoire
            ]
        ); //renvoie la vue avec les articles}

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Repertoire $repertoire)
    {
        //afficher le formulaire pour modifier l'article

        return view('repertoire.edit', [
            'repertoire' => $repertoire
        ]); //renvoie la vue d'édition avec la publication

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repertoire $repertoire)
    {
        //enregistrer l'article modifié
        //update where blogPost->id => select where blogPost->id
        $repertoire->update(
            [
                'title' => $request->title,
                'title_fr' => $request->title_fr,
            ]
        );

        return redirect()->back()->withSuccess(trans('lang.eSuccess'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repertoire $repertoire)
    {
        //supprimer un article
        $repertoire->delete();

        return redirect(route('repertoire.index'));
    }
}
