<?php

class JsonTableController extends \BaseController {
	public function show()
	{
		return View::make('json');
	}
	public function getjson()
	{
		$j = Input::get('json');
		$validator = Validator::make(
			    array('json' =>$j),
			    array('json' => 'required')
			);
		if ($validator->fails())
				{
				    return Redirect::back()->withErrors('You have not entered anything');
				}
	else{
		try{
			json_decode($j);
			$this->createTable($j);
		}
		catch (Exception $e)
		{	
			return Redirect::back()->withErrors('This is not a valid Json Or it is a duplicate entry');
		}
		}
		
	
	}
	public function createTable($j)
	{
		$json = json_decode($j,true);
		
		DB::transaction(function($json) use ($json){
			$tablename=str_random(5);

			Schema::create($tablename,function($table) use ($json){
				$table->increments('id');
				foreach ($json['fields'] as  $f) {
					$table->string($f['cid']);
				}
				$table->timestamps();

			});
		});
	}


}
