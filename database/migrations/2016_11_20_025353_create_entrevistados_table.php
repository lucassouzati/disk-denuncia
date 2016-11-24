<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrevistadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrevistados', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('faixa_etaria', ['Não informada',
                                        'De 8 a 12 anos',
                                        'De 13 a 17 anos',
                                        'De 18 a 30 anos',
                                        'De 31 a 40 anos',
                                        'De 41 a 50 anos',
                                        'De 51 a 60 anos',
                                        'Mais de 61 anos'])->nullable();
            $table->enum('renda_familiar', ['Não informada',
                                        'De 0 a 1 salário minimo',
                                        '2 salários mínimos',
                                        '3 salários mínimos',
                                        '4 salários mínimos',
                                        '5 salários mínimos',
                                        '6 salários mínimos ou mais',])->nullable();;
            $table->enum('raca', ['Não Informada',
                                  'Branca',
                                  'Preta',
                                  'Amarela',
                                  'Parda',
                                  'Indígena'])->nullable();
            $table->integer('cidade_id')->nullable();
            $table->boolean('conhece_disk_denuncia')->nullable();
            $table->text('consideracao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entrevistados');
    }
}
