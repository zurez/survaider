<?php

class ResponseController extends \BaseController {

	public function filter()
	{
		$j = Input::get('jdata');
		if ($j==null) {
			return Response::json(array('message'=>'No Data Was Sent To Server'));
		}
		else{
			$this->checkToken($j);
		}
	}
	public function checkToken($j)
	{
		$json = json_decode($j,true);
				if (Schema::hasTable($json['survey_id'])) {
					# code..
					//Not checking for token right now.
					$this->saveResponse($json);
				}
				else {
					return Response::json(array('message'=>'The Survey You Requested Does not Exists'));
				}
	}
	public function tempStore($json)
	{
		
	}
	public function saveResponse($json)
	{	$table= $json['survey_id'];
		$cid= $json['c_id'];//Our Column
		$response=$json['answer'];
		$user= $json['u_id'];
		DB::table($table)->insert(array($cid=>$response))->where()
	}

}
