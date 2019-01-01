<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToOperationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('operation', function(Blueprint $table)
		{
			$table->foreign('compte_monetaire_id', 'operation_ibfk_1')->references('id')->on('compte_monetaire')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('operation', function(Blueprint $table)
		{
			$table->dropForeign('operation_ibfk_1');
		});
	}

}
