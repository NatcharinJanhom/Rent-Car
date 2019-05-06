<?php
require "libs/ApiHelper.php";

class Other_service extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function get_festival_by_province()
    {
        $province = $_POST['province'];
        $data = array(
            "provinceSearch" => $province
        );
        $fest = ApiHelper::callAPI("POST", URL_API_MUSIC . "/festivals/province", json_encode($data));
        header('Content-type: application/json');
        print $fest;
    }
    function get_festival_by_date()
    {
        $startDate = $_POST['startDate'];
        $endDate = $_POST['endDate'];
        $province= $_POST['province'];
        $data = array(
            "provinceSearch" => $province
        );
        if (!debug) {
            $startDate = To_yearadd543($startDate);
            $endDate = To_yearadd543($endDate);
        }
        $fest = ApiHelper::callAPI("POST", URL_API_MUSIC . "/festivals/startDate/$startDate/endDate/$endDate",json_encode($data));
        header('Content-type: application/json');
        print $fest;
    }
}
