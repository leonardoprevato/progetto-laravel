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
        $all_ingredients_data= ActiveIngredient::all();
        return Inertia::render('ActiveIngredients',['data'=>$all_ingredients_data]); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ActiveIngredient::find($id)->load('drugs');
        return Inertia::render('ingredients/Edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        ActiveIngredient::find($id)->update($request->validate([
            'atc_code' => ['required','min:5'],
            'main_ingredients' => ['required','min:5'],
            'description' => ['required','min:5'],
        ]));
        return to_route('active_ingredients.index');
    }

    public function create()
    {
        return Inertia::render('ingredients/Create');
    }

    public function store(Request $request)
    {
        $validated_request = $request->validate(
            [
                'atc_code' => ['required','min:5'],
                'main_ingredients' => ['required','min:5'],
                'description' => ['required','min:5'],
            ]
    );
        ActiveIngredient::create($validated_request);
        return to_route('active_ingredients.index');
    }

    public function destroy(string $id)
    {
        $data = ActiveIngredient::find($id)->delete();
        return to_route('active_ingredients.index');
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
        $all_ingredients_data= ActiveIngredient::find($id);
        return Inertia::render('ActiveIngredient',['data'=>$all_ingredients_data]);
    }

 

}
