<?php

class EmbedController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($surveyId=Null)
	{
		
		return Response::json(array(
			"survey_link":""
			"token":""

			));

	}





	
	public function show($id)
	{
	}







}
