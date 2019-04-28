<?php

class Manage_Booking extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {		
		$this->view->render('page/manage_booking');
	}

	function search_car()
	{
		$data = array(
			"start_date"=> "2019-04-16",
			"end_date"=> "2019-04-17",
			"province_id"=> 1
		);
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