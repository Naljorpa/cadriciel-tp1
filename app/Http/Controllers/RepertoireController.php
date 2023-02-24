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

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:pdf,zip,doc|max:10240', // maximum 10MB
        ]);

        // source du code: chatgpt
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $timestamp = time();
        $file->storeAs('public/uploads', $timestamp.$filename);
        $link = $timestamp.$filename;
        
        $newDoc = Repertoire::create(
            [
                'title' => $request->title,
                'title_fr' => $request->title_fr,
                'location' => $link,
                'user_id' => Auth::user()->id,
                'body_fr' => $request->body_fr
            ]
        );
        // Optionally, you can store the file information in a database table
        // with the user who uploaded it and other metadata.

        return back()->with('success', 'Le fichier a été téléversé avec succès.');

    }

    //source solution chat gpt
    public function download($id)
    {
        $repertoire = Repertoire::findOrFail($id);
        $path = Storage::path('public/uploads/'.$repertoire->location);
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
}
