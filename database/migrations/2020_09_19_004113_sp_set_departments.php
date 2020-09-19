<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpSetDepartments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            INSERT INTO `departamentos` (`id`, `name`) VALUES
            ('01', 'Amazonas'),
            ('02', 'Áncash'),
            ('03', 'Apurímac'),
            ('04', 'Arequipa'),
            ('05', 'Ayacucho'),
            ('06', 'Cajamarca'),
            ('07', 'Callao'),
            ('08', 'Cusco'),
            ('09', 'Huancavelica'),
            ('10', 'Huánuco'),
            ('11', 'Ica'),
            ('12', 'Junín'),
            ('13', 'La Libertad'),
            ('14', 'Lambayeque'),
            ('15', 'Lima'),
            ('16', 'Loreto'),
            ('17', 'Madre de Dios'),
            ('18', 'Moquegua'),
            ('19', 'Pasco'),
            ('20', 'Piura'),
            ('21', 'Puno'),
            ('22', 'San Martín'),
            ('23', 'Tacna'),
            ('24', 'Tumbes'),
            ('25', 'Ucayali');
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
