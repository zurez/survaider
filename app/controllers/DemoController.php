<?php
class DemoController extends \BaseController {

	public function filter()
	{
		$j = Input::get('jdata');
		
		// DB::table('temp_json')->insert(array('content'=>serialize($j)));
		// return Response::json(array('status'=>'success'));exit();
		///
		if ($j==null) {
			return Response::json(array('status'=>'failure1'));
		}
		else{
			$this->toJson($j);
		}
	}
	public function toJson($j)
	{
		$json=json_decode($j,true);
		$this->alt($json);
	}
	public function alt($json)
	{
		 
		if ($json['unq']=="lol") {
			
			$unq= str_random(5);
			DB::table('survey_mohali')->insert(array('unq'=>$unq));
			return Response::json(array('unq'=>$unq,'status'=>'success'));
		}
			

		
	
		else {
			$response=$json['answer'];
			$c_id=$json['cid'];
			$unq=$json['unq'];
			DB::table('survey_mohali')->where('unq',$unq)->update(array($c_id=>$response));
			return Response::json(array('unq'=>$unq,'status'=>'success'));

		}

	}
	public function check($json)

	{	$delimiter= "$$DDD$$$";
		$replace="$ddd$$$";
		$id= $json['id'];
		$c_id=$json['c_id'];
		$response=$json['answer'];
		$exists = DB::table('survey')->where('name', $name)->first();
		if (!$exists) {
			DB::transaction(
				function ()
				{
				try{
					if (is_array($response)) {
						$temp="";
						foreach ($response as $k) {
							$k=str_replace($delimiter,$replace,$k);
							$temp= $temp.$k.$delimiter;
						}
						$response=$temp;
					}
					
					DB::table('survey')->insert(array('name'=>$name,$c_id=>$response));
					Response::json(array('message'=>'Success'));
					}
				catch (\Exception $e){
					Response::json(array('message'=>'Error'));
					}
				}
				);


		}
		elseif($exists) {
			try{
			DB::table('survey')->where('name',$name)->update(array($c_id=>$response));
			Response::json(array('message'=>'Success'));
			}
			catch(\Exception $e) {
				Response::json(array('message'=>'Error'));
			}
		}
		else {
			Response::json(array('message'=>'Error'));
		}
	}


}
