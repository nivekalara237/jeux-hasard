<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompteMonetaireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compte_monetaire', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->float('solde', 10, 0)->default(0);
			$table->enum('type_paiement', array('OM','momo','carte','espace'))->default('espace');
			$table->bigInteger('joueur_id')->index('joueur_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('compte_monetaire');
	}

}
