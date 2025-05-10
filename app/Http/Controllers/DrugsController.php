<?php

namespace App\Http\Controllers;
use App\Models\Drug;
use App\Models\Company;
use App\Models\ActiveIngredient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DrugsController extends Controller
{
    public function index()
    {
        $all_drugs_data= Drug::all();
        return Inertia::render('Drugs',['data'=>$all_drugs_data]); 
    }

    public function getdrugs()
    {
        return Drug::all();
    }

    public function fetchdrugs(string $id)
    {
        return Drug::find($id);
    }

  /**
     * Show the form for creating a new resource. 
     */
    public function create()
    {
        $all_drugs_data= Company::all();
        $all_ingredients_data= ActiveIngredient::all();
        return Inertia::render('drugs/Create',['companies'=>$all_drugs_data,'ingredients'=>$all_ingredients_data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_request = $request->validate([
            'company_id'=>['required'],
            'active_ingredient_id'=>['required'],
            'codice_minsan' => ['required','min:5'],
            'name' => ['required','min:5'],
            'description' => ['required','min:5'],
            'expiration_date' => ['required','min:5'],
            'price' => ['required'],    
        ]);

        Drug::create($validated_request);

        return to_route('drug.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $all_companies_data= Drug::find($id)->load('active_ingredient')->load('company');
        return Inertia::render('Drug',['data'=>$all_companies_data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Drug::find($id)->load('active_ingredient');
        $all_drugs_data= Company::all();
        $all_ingredients_data= ActiveIngredient::all();
        return Inertia::render('drugs/Edit',['data'=>$data,'companies'=>$all_drugs_data,'ingredients'=>$all_ingredients_data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Drug::find($id)->update($request->validate([
            'codice_minsan' => ['required','min:5'],
            'company_id' => ['required'],
            'active_ingredient_id' => ['required'],
            'name' => ['required','min:5'],
            'description' => ['required','min:5'],
            'expiration_date' => ['required','min:5'],
            'price' => ['required'],
        ]));
        return to_route('drug.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Drug::find($id)->delete();
        return to_route('drug.index');
    }
}
