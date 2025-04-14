<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('drugs')->insert([
            ['codice_minsan' => '25319043', 'name'=>'Neo-Optalidon Compresse','description'=>'Farmaco di automedicazione indicato nel trattamento sintomatico degli stati dolorosi acuti, tra cui mal di testa e dolori mestruali. Farmaco OTC (Perrigo)','expiration_date'=>date('Y-m-d'),'price'=>0.0,'created_at'=> date('Y-m-d H:i:s'),'company_id'=>1,'active_ingredient_id'=>1]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
