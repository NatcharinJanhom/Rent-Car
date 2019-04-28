<?php
require("libs/ApiHelper.php");
class home extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$data = array(
			"start_date"=> "2019-04-16",
			"end_date"=> "2019-04-17",
			"province_id"=> 1
		);
		print_r(ApiHelper::callAPI("GET",URL_API."/rents/cars/startDate/16-04-2019/endDate/17-04-2019/province/1"));
		//$this->view->render('page/homepage');
	}
}
