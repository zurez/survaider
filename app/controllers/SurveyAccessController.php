<?php

class SurveyAccessController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$rules = array('email' => 'required|email|unique:access');
		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {

        // get the error messages from the validator
        $messages = $validator->messages();

        // redirect our user back to the form with the errors from the validator
        return Redirect::back()
            ->withErrors($validator);

    			}
    	else {
    		$this->init(Input::get('email'));
    	}
	}
	
	public function init($email){
	// {	$email= Input::get('mail');
		$parts = explode("@", $email);
		$username = $parts[0];
		$token = $token = bin2hex(md5($_SERVER['HTTP_USER_AGENT'] . time()));

		DB::transaction(function() use($token,$email,$username){
			$access= new Access;
			$access->email= $email;
			$access->token= $token;
			$access->username=$username;
			$access->counter=0;
			$access->save();
		});
		Mailgun::send('emails.mail', array('username'=>$username,'token'=>$token), function($message) use ($email){
                     $message->to($email,"Hey")->subject('Welcome!');});//mail
		$message= "We have sent an email to ".$email." with survey link and instructions";
		$this->success($email);
		// return View::make('mailsuccess')->with(array('message'=>$message));

		// return "We have sent an email to ".$email." with survey link and instructions";
	}

	public function success($email)
	{
		return "We have sent an email to ".$email." with survey link and instructions";
	}

	//GIVE ACCESS BY TOKEN AND TIME
	public function giveAccess($token,$username)
	{	
		$time= strtotime(DB::table('access')->where('token',$token)->pluck('created_at'));
		$counter=intval(DB::table('access')->where('token',$token)->pluck('counter'));
		$currenttime=time();
		$dtime= $currenttime-$time;
	
		$allowedtime=300;//in seconds
		$allowedcounter=5;

			if ($counter>$allowedcounter or $dtime>$allowedtime) {
				DB::table('access')->where('token',$token)->delete();
				return "This download link has expired. Please request for a new link.";
			}
			elseif ($counter<$allowedcounter and $dtime<$allowedtime) {
				$newcounter = intval($counter)+1;
				DB::table('access')
	            ->where('token',$token)
	            ->update(array('counter' => $newcounter));
	            return View::make('builder');
	            
			}
			else{
				return "Something went wrong!";
			}

	}

}
