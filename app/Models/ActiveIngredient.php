<?php

namespace App\Models;
use App\Models\Drug;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ActiveIngredient extends Model
{
    protected $fillable = ['atc_code','main_ingredients','description']; //qui ci vanno i campi della tabella che vuoi modificare
    use SoftDeletes;
    public function drugs()
    {
        return $this->hasMany(Drug::class);
    }
}
