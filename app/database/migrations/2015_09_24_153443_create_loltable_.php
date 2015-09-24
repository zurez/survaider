<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoltable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survey_mohali_a', function($table)
		{
			$table->increments('id');
			$table->string('unq');
			for ($i=1; $i <15 ; $i++) { 
				$table->string("c".$i);
				$table->string("c".$i."o");//option open
				$table->string("c".$i."g");//game played timing
			
			}
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
		Schema::drop("survey_mohali_a");
	}
	



}
