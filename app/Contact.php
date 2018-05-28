<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['nom', 'prenom', 'societe','numero_rue','rue', 'code_postal', 'ville', 'message'];
}

