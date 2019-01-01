<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToCompteMonetaireTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('compte_monetaire', function(Blueprint $table)
		{
			$table->foreign('joueur_id', 'compte_monetaire_ibfk_1')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('compte_monetaire', function(Blueprint $table)
		{
			$table->dropForeign('compte_monetaire_ibfk_1');
		});
	}

}
