<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNstagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nstages', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->date('datedebut');
            $table->date('datefin');
            $table->string('curriculumvitae', 100);
            $table->string('motivation', 100);
            $table->string('rapport', 100)->nullable();
            $table->boolean('visibilite')->default(true);
            $table->boolean('invitation')->default(false);
            $table->boolean('approbation')->default(false);
            $table->string('theme')->nullable();
            $table->unsignedBigInteger('id_agent')->nullable();
            $table->foreign('id_agent')
            ->references('id')->on('agents')
            ->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')
            ->references('id')->on('users')
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
        Schema::dropIfExists('nstages');
    }
}
