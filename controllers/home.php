<?php
require "libs/ApiHelper.php";
class home extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $province = ApiHelper::callAPI("GET", URL_API . "/provinces");
        date_default_timezone_set("Asia/Bangkok");
        $startDate = date("Y-m-d"); 
        $endDate = date("Y-m-d",strtotime("tomorrow")); 
        if(!debug)
        {
            $startDate =To_yearadd543($startDate);
            $endDate =To_yearadd543($endDate);
        }
        $chiang_mai = ApiHelper::callAPI("GET", URL_API."/rents/cars/startDate/$startDate/endDate/$endDate/province/38");
        $bangkok = ApiHelper::callAPI("GET", URL_API."/rents/cars/startDate/$startDate/endDate/$endDate/province/1");
        $phuket = ApiHelper::callAPI("GET", URL_API."/rents/cars/startDate/$startDate/endDate/$endDate/province/66");
        $khonkean = ApiHelper::callAPI("GET", URL_API."/rents/cars/startDate/$startDate/endDate/$endDate/province/28");
        $this->view->province = $province;
        $this->view->chiang_mai = $chiang_mai;
        $this->view->bangkok = $bangkok;
        $this->view->phuket = $phuket;
        $this->view->khonkean = $khonkean;
        $this->view->render('page/homepage');
    }
}
