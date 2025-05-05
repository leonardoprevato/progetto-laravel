<?php

namespace App\Http\Controllers;
use App\Models\Drug;
use App\Models\ActiveIngredient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DrugsController extends Controller
{
    public function index()
    {
        $all_ingredients_data= Drug::all();
        return Inertia::render('Drugs',['data'=>$all_ingredients_data]); 
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
     * Show the form for creating a new resource. NON SONO FUNZIONI CRUD
     */
    public function create()
    {
        return Inertia::render('company/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated_request = $request->validate(['name' =>['required','min:5']]);

        Drug::create($validated_request);

        return to_route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $all_companies_data= Drug::find($id);
        return Inertia::render('Drug',['data'=>$all_companies_data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Drug::find($id)->load('drugs');
        return Inertia::render('company/Edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Drug::find($id)->update($request->validate([
            'atc_code' => ['required','min:5'],
            'main_ingredients' => ['required','min:5'],
            'description' => ['required','min:5'],
        ]));
        return to_route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Drug::find($id)->delete();
        return to_route('company.index');
    }
}
