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

}