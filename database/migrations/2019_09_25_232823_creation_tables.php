<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreationTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('idpatients');
            $table->string('nom');
            $table->string('postnom');
            $table->string('prenom');
           
        });

        Schema::create('medicaments', function (Blueprint $table) {
            $table->bigIncrements('idmedicaments');
            $table->string('lib');
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('idusers');
            $table->string('name');
            $table->string('pseudo')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('medecins', function (Blueprint $table) {
            $table->bigIncrements('idmedecins');
            $table->string('name');
            $table->string('pseudo')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('ordonnances', function (Blueprint $table) {
            $table->bigIncrements('idordonnances');
            $table->unsignedBigInteger('idpatients');
            $table->unsignedBigInteger('idmedecins');
            $table->enum('statut',['en_cours','envoyer','archiver'])->default('en_cours');

            $table->foreign('idpatients')
                  ->references('idpatients')->on('patients')->onDelete('cascade');
            $table->foreign('idmedecins')
                  ->references('idmedecins')->on('medecins')->onDelete('cascade');
            $table->timestamps();


        });

        Schema::create('prescriptions', function (Blueprint $table) {
            $table->bigIncrements('idprescriptions');
            $table->unsignedBigInteger('idmedicaments');
            $table->unsignedBigInteger('idordonnances');
            $table->integer('quantite');
            $table->text('description');

            $table->foreign('idmedicaments')
                  ->references('idmedicaments')->on('medicaments')->onDelete('cascade');
            $table->foreign('idordonnances')
                  ->references('idordonnances')->on('ordonnances')->onDelete('cascade');
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
        //
    }
}
