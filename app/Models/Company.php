<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];



    // $guarded => contiene array di attributi che non vogliamo siano modificabili,
    //  vuoto se vogliamo consentire la modifica di tutti gli elementi
    //protected $guarded = ['id','created_at','update_at'];
}
