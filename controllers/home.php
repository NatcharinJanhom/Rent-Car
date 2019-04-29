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
		$province =ApiHelper::callAPI("GET",URL_API."/provinces");
		$this->view->province = $province;
		$this->view->render('page/homepage');
	}
}
