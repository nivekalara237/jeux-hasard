<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartieTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('partie', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('libelle');
			$table->text('description', 65535)->nullable();
			$table->integer('jeu_id')->index('jeu_id');
			$table->boolean('statut')->default(1);
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('superviseur_id')->index('superviseur_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('partie');
	}

}
