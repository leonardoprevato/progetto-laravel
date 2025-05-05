<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ActiveIngredient;

class Drug extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    
    public function active_ingredient(): BelongsTo
    {
        return this->belongsTo(ActiveIngredient::class);
    }
}
