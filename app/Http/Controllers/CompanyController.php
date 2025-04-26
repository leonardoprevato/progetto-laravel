<?php

//  php artisan make:controller CompanyController --resource per creare controller con funzioni gia crud

namespace App\Http\Controllers;
use App\Models\Company;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource. NON SONO FUNZIONI CRUD
     */
    public function index()
    {
        //return Company::all();
        $all_companies_data= Company::all();
        return Inertia::render('Companies',['data'=>$all_companies_data]);  //per usare vue
         //return response()->view('companies')['data'=>$all_companies_data]; //per usare blade
    }

    public function getcompany2()
    {
        return Company::all();
    }
    public function fetchcompany2(string $id)
    {
        return Company::all();
    }


    public function fetchDrugsByCompany (string $id)
    {
        $drug= Company::find($id);
        return $drug->drugs;
    }
    

    /**
     * Show the form for creating a new resource. NON SONO FUNZIONI CRUD
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
