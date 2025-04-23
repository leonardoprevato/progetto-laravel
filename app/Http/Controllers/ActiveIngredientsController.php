<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Drugs;
use App\Models\Company;
use App\Models\ActiveIngredients;
use Inertia\Inertia;

class ActiveIngredientsController extends Controller
{
    public function index()
    {
        $active_ingredients = ActiveIngredients::with(['drugs', 'activeIngredient'])->get();
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
        return ActiveIngredients::all();
    }

    public function fetchdrugs(string $id)
    {
        return ActiveIngredients::find($id);
    }

    public function store(Request $request)
    {
      
    }

    public function show(string $id)
    {
        $drug = ActiveIngredients::with(['company', 'drugs'])->findOrFail($id);
        return Inertia::render('ActiveIngredients/Show', ['activeingredients' => $drug]);
    }

    public function edit(string $id)
    {
       
    }

    public function update(Request $request, string $id)
    {
       
    }

    public function destroy(string $id)
    {
      
    }

}
