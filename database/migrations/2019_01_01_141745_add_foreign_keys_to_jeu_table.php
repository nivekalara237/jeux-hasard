<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToJeuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('jeu', function(Blueprint $table)
		{
			$table->foreign('id', 'jeu_ibfk_1')->references('jeu_id')->on('partie')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('jeu', function(Blueprint $table)
		{
			$table->dropForeign('jeu_ibfk_1');
		});
	}

}
