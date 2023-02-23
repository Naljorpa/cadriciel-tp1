<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $primaryKey = 'user_id';

    // les champs autorisé lors de insert et update
    protected $fillable = [
        'user_id',
        'nom',
        'addresse',
        'phone',
        'email',
        'date_de_naissance',
        'ville_id'
    ];

    public function etudiantHasVille(){
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
       }
}
