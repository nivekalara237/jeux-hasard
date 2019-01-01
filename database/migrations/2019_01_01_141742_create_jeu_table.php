<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJeuTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jeu', function(Blueprint $table)
		{
			$table->integer('id')->primary();
			$table->string('libelle')->unique('libelle');
			$table->text('description', 65535)->nullable();
			$table->integer('max_joueur')->nullable();
			$table->integer('min_joueur')->nullable();
			$table->float('mise_unitaire', 10, 0)->nullable();
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
		Schema::drop('jeu');
	}

}
