<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repertoire extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'title_fr',
        'location',
        'user_id'
    ];

    //like a inner join
    public function repertoireHasUser()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
  
}
