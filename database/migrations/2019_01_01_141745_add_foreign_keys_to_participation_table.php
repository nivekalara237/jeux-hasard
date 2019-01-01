<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToParticipationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('participation', function(Blueprint $table)
		{
			$table->foreign('partie_id', 'participation_ibfk_2')->references('id')->on('partie')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('joueur_id', 'participation_ibfk_3')->references('id')->on('users')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('participation', function(Blueprint $table)
		{
			$table->dropForeign('participation_ibfk_2');
			$table->dropForeign('participation_ibfk_3');
		});
	}

}
