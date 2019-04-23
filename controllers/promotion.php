<?php

class Promotion extends Controller {

	function __construct() {
		parent::__construct();
	}
	
	function index() {		
		$this->view->render('page/promotion');
	}
}