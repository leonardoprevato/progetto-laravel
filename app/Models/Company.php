<?php

namespace App\Models;
use App\Models\Drugs;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name'];
    use SoftDeletes;
    public function drugs()
    {
        return $this->hasMany(Drugs::class);
    }

    // $guarded => contiene array di attributi che non vogliamo siano modificabili,
    //  vuoto se vogliamo consentire la modifica di tutti gli elementi
    //protected $guarded = ['id','created_at','update_at'];
}
