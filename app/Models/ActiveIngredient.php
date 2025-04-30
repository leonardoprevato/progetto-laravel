<?php

namespace App\Models;
use App\Models\Drugs;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ActiveIngredient extends Model
{
    protected $fillable = ['name'];
    use SoftDeletes;

    public function drugs()
    {
        return $this->hasMany(Drugs::class);
    }
}
