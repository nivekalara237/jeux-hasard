<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateParticipationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('participation', function(Blueprint $table)
		{
			$table->increments('id');
			$table->float('mise', 10, 0);
			$table->bigInteger('joueur_id')->index('joueur_id');
			$table->integer('partie_id')->index('partie_id');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('upated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
		Schema::drop('participation');
	}

}
