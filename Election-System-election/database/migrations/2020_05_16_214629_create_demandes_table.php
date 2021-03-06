<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('cin');
            $table->string('email');
        
        
            $table->string('photo');
            $table->string('sexe');
            $table->date('birth_date');
            $table->string('department');
            $table->string('class');
        
            $table->string('description');

            $table->integer('status')->default(0);
            $table->integer('vu')->default(0);
            
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
        Schema::dropIfExists('demandes');
    }
}
