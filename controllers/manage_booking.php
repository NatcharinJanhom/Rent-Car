<?php
require("libs/ApiHelper.php");
class Manage_Booking extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {		
		$this->view->render('page/manage_booking');
	}

	function search_car()
	{
		$start_date = (isset($_GET['start_date']))?$start_date = dmy_TO_ymd($_GET['start_date']) :  $start_date=NULL;
		$end_date =(isset($_GET['end_date']))?$end_date = dmy_TO_ymd($_GET['end_date']) :  $end_date=NULL;
		$provine_id =(isset($_GET['provine_id']))?$provine_id = $_GET['provine_id'] :  $provine_id=NULL;
		$carList =ApiHelper::callAPI("GET",URL_API."/rents/cars/startDate/$start_date/endDate/$end_date/province/$provine_id");
		$data_search = array("start_date"=>$start_date, "end_date"=>$end_date, "provine_id"=>$provine_id);
		$this->view->carList =$carList;
		$province =ApiHelper::callAPI("GET",URL_API."/provinces");
		$this->view->province = $province;
		$this->view->data_search =$data_search;
		$this->view->render('rent_car/result_search');
	}
	function detail_car()
	{
		$this->view->render('rent_car/detail_car');
	}
	function booking()
	{
		$this->view->render('rent_car/booking_detail');
	}
	function booking_detail()
	{
		$this->view->render('rent_car/booking_no_user');
	}

}