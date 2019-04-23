<?php

class Car_Type extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {		
		$this->view->render('page/car_type');
	}
}