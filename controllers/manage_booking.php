<?php
require("libs/ApiHelper.php");
class Manage_Booking extends Controller
{

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->view->render('page/manage_booking');
	}

	function search_car()
	{
		$start_date = (isset($_GET['start_date'])) ? $start_date = dmy_TO_ymd($_GET['start_date']) : $start_date = NULL;
		$end_date = (isset($_GET['end_date'])) ? $end_date = dmy_TO_ymd($_GET['end_date']) : $end_date = NULL;
		$provine_id = (isset($_GET['provine_id'])) ? $provine_id = $_GET['provine_id'] : $provine_id = NULL;
		$carList = ApiHelper::callAPI("GET", URL_API . "/rents/cars/startDate/$start_date/endDate/$end_date/province/$provine_id");
		$data_search = array("start_date" => $start_date, "end_date" => $end_date, "provine_id" => $provine_id);
		$this->view->carList = $carList;
		$province = ApiHelper::callAPI("GET", URL_API . "/provinces");
		$this->view->province = $province;
		$this->view->data_search = $data_search;
		$this->view->render('rent_car/result_search');
	}
	function detail_car()
	{
		$start_date = (isset($_GET['start_date'])) ? $start_date = $_GET['start_date'] : $start_date = NULL;
		$end_date = (isset($_GET['end_date'])) ? $end_date = $_GET['end_date'] : $end_date = NULL;
		$provine_id = (isset($_GET['provine_id'])) ? $provine_id = $_GET['provine_id'] : $provine_id = NULL;
		$carId = (isset($_GET['carId'])) ? $carId = $_GET['carId'] : $carId = NULL;
		$data_search = array("start_date" => $start_date, "end_date" => $end_date, "provine_id" => $provine_id, "carId" => $carId);
		$car = ApiHelper::callAPI("GET", URL_API . "/cars/$carId");
		$this->view->car = $car;
		$this->view->data_search = $data_search;
		$this->view->render('rent_car/detail_car');
	}
	function booking()
	{
		$startDate = (isset($_REQUEST['startDate'])) ? $startDate = dmy_TO_ymd($_REQUEST['startDate']) : $startDate = NULL;
		$endDate = (isset($_REQUEST['endDate'])) ? $endDate = dmy_TO_ymd($_REQUEST['endDate']) : $endDate = NULL;
		$carId = (isset($_REQUEST['carId'])) ? $carId = $_REQUEST['carId'] : $carId = NULL;
		$withDriver = (isset($_REQUEST['withDriver'])) ? $withDriver = $_REQUEST['withDriver'] : $withDriver = NULL;
		$address = (isset($_REQUEST['address'])) ? $address = $_REQUEST['address'] : $address = NULL;
		$phoneNumber = (isset($_REQUEST['phoneNumber'])) ? $phoneNumber = $_REQUEST['phoneNumber'] : $phoneNumber = NULL;
		$data = array(
			"carId"=>	$carId,
			"refId"=> 0,
			"addressNotMember" =>$address,
			"phoneNumberNotMember" =>$phoneNumber,
			"startDate"=> $startDate,
			"endDate"=> $endDate,
			"withDriver"=> $withDriver
		);
		print_r(json_encode($data));
		$booking_detail = ApiHelper::callAPI("POST", URL_API . "/rents",json_encode($data));
		$this->view->booking_detail =$booking_detail;
		$this->view->render('rent_car/booking_detail');
	}
	function booking_detail()
	{
		$this->view->render('rent_car/booking_no_user');
	}
}
