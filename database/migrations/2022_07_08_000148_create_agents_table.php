<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->index("id")->unsigned();
            $table->string('prenom', 50);
            $table->string('nom', 25);
            $table->string('email', 100)->unique();
            $table->string('tel', 16)->unique();
            $table->string('fonction');
            $table->boolean('visibilite')->default(true);
            $table->unsignedBigInteger('id_service')->nullable();
            $table->foreign('id_service')
            ->references('id')->on('services')
            ->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('agents');
    }
}
