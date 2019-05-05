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
		Session::init();
		$user = Session::get("user");

		if ($user) {
			$temp = explode(".", $user->result);
			$data = json_decode(base64_decode($temp[1]));
			if ($data->typeUser == "ADMIN") {
				$list = ApiHelper::callAPI("GET", URL_API . "/rents", "", $user->result);
				$this->view->list = $list;
				$this->view->render('manage_booking/manage_booking_admin');
			} else
				//$list = ApiHelper::callAPI("GET", URL_API . "/rents/users/".$data->, "", $user->result);
				$this->view->render('page/manage_booking');
		} else {
			$this->view->render('manage_booking/booking_no_user');
		}
	}


	function search()
	{
		$rent_search = (isset($_POST['rent_search'])) ? $rent_search = $_POST['rent_search'] : $rent_search = NULL;
		$booking_detail = ApiHelper::callAPI("GET", URL_API . "/rents/rentSearch/$rent_search");
		$this->view->booking_detail = $booking_detail;
		$this->view->render('manage_booking/booking_detail');
	}
	public function update_status()
	{
		$rentId = (isset($_POST['rentId'])) ? $rentId = $_POST['rentId'] : $rentId = NULL;
		$status_rent = (isset($_POST['status_rent'])) ? $status_rent = $_POST['status_rent'] : $status_rent = NULL;
		$data = array(
			"rentId" => $rentId,
			"status" => $status_rent
		);
		Session::init();
		$user = Session::get("user");
		$check = false;
		try {
			ApiHelper::callAPI("PUT", URL_API . "/rents", json_encode($data), $user->result);
			$check = true;
		} catch (exception $e) {

			$check = false;
		}
		header('Content-type: application/json');
		print json_encode($check);
	}
}
