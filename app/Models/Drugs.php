<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ActiveIngredient;

class Drugs extends Model
{
    protected $fillable = ['name'];
    use SoftDeletes;
    public function activeIngredient(){
        return this->belongsTo(ActiveIngredient::class);
    }
}
