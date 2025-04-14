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
        DB::table('active_ingredients')->insert([
            ['atc_code' => 'N02BE01', 'main_ingredients'=>'Paracetamolo','description'=>'Il paracetamolo è un farmaco ad azione analgesica e antipiretica, usato per ridurre dolore e febbre. Agisce sul sistema nervoso centrale, alleviando sintomi come mal di testa, dolori muscolari e febbre. È disponibile in diverse forme farmaceutiche, come compresse, supposte e sciroppi.\n\nIl paracetamo', 'created_at'=> date('Y-m-d H:i:s')],
            ['atc_code' => '000R05X', 'main_ingredients'=>'Olio essenziale di Eucalipto','description'=>'Olio essenziale di EucaliptoL\'olio essenziale di eucalipto, estratto dalle foglie dell\'albero di eucalipto, è noto per le sue proprietà balsamiche e rinfrescanti. Usato per alleviare la congestione nasale e la tosse, può essere inalato o applicato topicamente diluito. Ha anche proprietà antisettiche e antinfiammatorie', 'created_at'=> date('Y-m-d H:i:s')],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
