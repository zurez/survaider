<?php

class EmbedController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		return Response::json(array(
			"error"=>"false",
			"condition"=>"alive"

			));

	}





	
	public function show($id)
	{
		return Response::json(
			array(
				"survey_id"=>$id,
				"survey"=>"{'yolo':'YOLO'}",
				"response"=>"lol")
			);
	}







}
