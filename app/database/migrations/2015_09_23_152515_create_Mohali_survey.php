<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMohaliSurvey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('survey_mohali', function($table)
		{
			$table->increments('id');
			for ($i=1; $i <15 ; $i++) { 
				$table->string("c".$i)->default("none");
				$table->string("c".$i."o")->default("none");//option open
				$table->string("c".$i."g")->default("none");//game played timing
			
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
		Schema::drop("survey_mohali");
	}

}
