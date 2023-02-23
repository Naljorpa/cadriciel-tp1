<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Forum;

class ForumController extends Controller
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
            $forums = Forum::select()->paginate(10);;
            return view('forum.index', ['forums' => $forums]);
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

        return view('forum.create');
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
            'body' => 'required',
        ]);


        //saisir un nouveau article
        //insert -> lastid => select where lastId
        $newPost = Forum::create(
            [
                'title' => $request->title,
                'body' => $request->body,
                'user_id' => Auth::user()->id,
                'title_fr' => $request->title_fr,
                'body_fr' => $request->body_fr
            ]
        );

        return redirect(route('forum.show', $newPost->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forum  $Forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //afficher un article de blog
 

        return view(
            'forum.show',
            [
                'forum'  => $forum
            ]
        ); //renvoie la vue avec les articles}

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //afficher le formulaire pour modifier l'article
    
        return view('forum.edit', [
            'forum' => $forum
        ]); //renvoie la vue d'édition avec la publication

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forum  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //enregistrer l'article modifié
        //update where blogPost->id => select where blogPost->id
        $forum->update(
            [
                'title' => $request->title,
                'body' => $request->body,
                'title_fr' => $request->title_fr,
                'body_fr' => $request->body_fr
            ]
        );

        return redirect(route('forum.show', $forum->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //supprimer un article
        $forum->delete();

        return redirect(route('forum.index'));
    }


    // //pagination
    // //select * from blog_posts limit 20 10
    // public function page()
    // {
    //     $forums = Forum::select()->paginate(2);
    //     return view('forum.page', ['forums' => $forums]);
    // }
}
