<?php
require "libs/ApiHelper.php";

class Car_manage extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $province = ApiHelper::callAPI("GET", URL_API . "/provinces");
        $this->view->province = $province;
        $this->view->render('car_manage/index');
    }
    function get_car()
    {
        Session::init();
        $user = Session::get("user");
        $car = ApiHelper::callAPI("GET", URL_API . "/cars", "", $user->result);
        header('Content-type: application/json');
        print $car;
    }
    public function create()
    {
        $licensePlate = (isset($_POST['licensePlate'])) ? $licensePlate = $_POST['licensePlate'] : $licensePlate = NULL;
        $model = (isset($_POST['model'])) ? $model = $_POST['model'] : $model = NULL;
        $seatCount = (isset($_POST['seatCount'])) ? $seatCount = $_POST['seatCount'] : $seatCount = NULL;
        $typeCar = (isset($_POST['typeCar'])) ? $typeCar = $_POST['typeCar'] : $typeCar = NULL;
        $brand = (isset($_POST['brand'])) ? $brand = $_POST['brand'] : $brand = NULL;
        $price = (isset($_POST['price'])) ? $price = $_POST['price'] : $price = NULL;
        //$discount = (isset($_POST['discount'])) ? $discount = $_POST['discount'] : $discount = NULL;
        $provinceByProvinceId = (isset($_POST['provinceByProvinceId'])) ? $provinceByProvinceId = $_POST['provinceByProvinceId'] : $provinceByProvinceId = NULL;
        $provinceByAddressProvince = (isset($_POST['provinceByAddressProvince'])) ? $provinceByAddressProvince = $_POST['provinceByAddressProvince'] : $provinceByAddressProvince = NULL;
        $data = array(
            "licensePlate" => $licensePlate,
            "model" => $model,
            "seatCount" =>  $seatCount,
            "typeCar" => $typeCar,
            "brand" => $brand,
            "price" => $price,
            "discount" => 0,
            "provinceByProvinceId" =>  $provinceByProvinceId,
            "provinceByAddressProvince" => $provinceByAddressProvince
        );
        Session::init();
        $user = Session::get("user");
        $check = false;
        try {
            ApiHelper::callAPI("POST", URL_API . "/cars", json_encode($data), $user->result);
            $check = true;
        } catch (exception $e) {
            $check = false;
        }
        header("Location:".URL."car_manage");
    }
    public function edit()
    {
        $carId = (isset($_POST['carId'])) ? $carId = $_POST['carId'] : $carId = NULL;
        $licensePlate = (isset($_POST['licensePlate'])) ? $licensePlate = $_POST['licensePlate'] : $licensePlate = NULL;
        $model = (isset($_POST['model'])) ? $model = $_POST['model'] : $model = NULL;
        $seatCount = (isset($_POST['seatCount'])) ? $seatCount = $_POST['seatCount'] : $seatCount = NULL;
        $typeCar = (isset($_POST['typeCar'])) ? $typeCar = $_POST['typeCar'] : $typeCar = NULL;
        $brand = (isset($_POST['brand'])) ? $brand = $_POST['brand'] : $brand = NULL;
        $price = (isset($_POST['price'])) ? $price = $_POST['price'] : $price = NULL;
        //$discount = (isset($_POST['discount'])) ? $discount = $_POST['discount'] : $discount = NULL;
        $provinceByProvinceId = (isset($_POST['provinceByProvinceId'])) ? $provinceByProvinceId = $_POST['provinceByProvinceId'] : $provinceByProvinceId = NULL;
        $provinceByAddressProvince = (isset($_POST['provinceByAddressProvince'])) ? $provinceByAddressProvince = $_POST['provinceByAddressProvince'] : $provinceByAddressProvince = NULL;
        $data = array(
            "licensePlate" => $licensePlate,
            "model" => $model,
            "seatCount" =>  $seatCount,
            "typeCar" => $typeCar,
            "brand" => $brand,
            "price" => $price,
             "discount" => 0,
            "provinceByProvinceId" =>  $provinceByProvinceId,
            "provinceByAddressProvince" => $provinceByAddressProvince
        );
        $car = false;
        Session::init();
        $user = Session::get("user");
        try {
            $car=ApiHelper::callAPI("PUT", URL_API . "/cars/$carId", json_encode($data), $user->result);
        } catch (exception $e) {
            $car = false;
        }
        header('Content-type: application/json');
        print $car;
    }
    public function delete()
    {
        Session::init();
        $user = Session::get("user");
        $carId = (isset($_POST['carId'])) ? $carId = $_POST['carId'] : $carId = NULL;
        try {
            $car=ApiHelper::callAPI("DELETE", URL_API . "/cars/$carId", "", $user->result);
        } catch (exception $e) {
            $car = false;
        }
 
        header('Content-type: application/json');
        print $car;
    }

}
