<?php

function stringOperation($string)
{
	# if any DeLimiter present in answer by user , replace it ,
	#Delimiter::: $$DDD$$$
	$delimiter= "$$DDD$$$";
	$replace="$ddd$$$"
	return str_replace($delimiter,$replace,$string);

}
class DemoController extends \BaseController {

	public function filter()
	{
		$j = Input::get('jdata');
		if ($j==null) {
			return Response::json(array('message'=>'No Data Was Sent To Server'));
		}
		else{
			$this->toJson($j);
		}
	}
	public function toJson($j)
	{
		$json=json_decode($j,true);
		$this->check($json);
	}
	public function check($json)

	{	$delimiter= "$$DDD$$$";
		$replace="$ddd$$$"
		$name= $json['name'];
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
