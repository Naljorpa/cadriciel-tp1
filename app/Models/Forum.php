<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;


    // si le nom de la table doit changer il faut declarer le nom de la table comme suit:
    // contourner le comportement d'eloquent par défault
    // protected $table = "Blog";
    // protected $primaryKey = "blog_id";

    // les champs autorisé lors de insert et update
    protected $fillable = [
        'title',
        'title_fr',
        'body',
        'body_fr',
        'user_id'
    ];

    //like a inner join
    public function forumHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
  
}
