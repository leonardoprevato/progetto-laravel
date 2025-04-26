<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Drugs;
use App\Models\Company;
use App\Models\ActiveIngredient;
use Inertia\Inertia;

class ActiveIngredientController extends Controller
{
    public function index()
    {
        $active_ingredients = ActiveIngredient::with(['drugs', 'activeIngredient'])->get();
        return Inertia::render('ActiveIngredients/Index', ['active_ingredients' => $active_ingredients]);
    }

    public function create()
    {
        return Inertia::render('ActiveIngredients/Create', [
            'companies' => Company::all(),
            'drugs' => Drugs::all()
        ]);
    }

    public function getdrugs()
    {
        return ActiveIngredient::all();
    }

    public function fetchingredients(string $id)
    {
        return ActiveIngredient::find($id);
    }


    public function fetchDrugsByIngredient (string $id)
    {
        
        $activeingredient= ActiveIngredient::find($id);
        return $activeingredient->drugs;
    }

  

    public function show(string $id)
    {
        $drug = ActiveIngredient::with(['company', 'drugs'])->findOrFail($id);
        return Inertia::render('ActiveIngredients/Show', ['activeingredients' => $drug]);
    }

 

}
