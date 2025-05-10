<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ActiveIngredient;
use App\Models\Company;

class Drug extends Model
{
    use SoftDeletes;

    protected $fillable = ['company_id','active_ingredient_id','codice_minsan','name','description','expiration_date','price'];
    
    public function active_ingredient(): BelongsTo
    {
        return $this->belongsTo(ActiveIngredient::class);
    }
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
