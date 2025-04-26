<?php

namespace App\Http\Controllers;
use App\Models\Drugs;
use App\Models\ActiveIngredient;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DrugsController extends Controller
{
    public function index()
    {
        $drugs = Drugs::with(['company', 'activeIngredient'])->get();
        return Inertia::render('Drugs/Index', ['drugs' => $drugs]);
    }

    public function create()
    {
        return Inertia::render('Drugs/Create', [
            'companies' => Company::all(),
            'ingredients' => ActiveIngredient::all()
        ]);
    }

    public function getdrugs()
    {
        return Drugs::all();
    }

    public function fetchdrugs(string $id)
    {
        return Drugs::find($id);
    }


    public function show(string $id)
    {
        $drug = Drugs::with(['company', 'activeIngredient'])->findOrFail($id);
        return Inertia::render('Drugs/Show', ['drug' => $drug]);
    }

  
}
