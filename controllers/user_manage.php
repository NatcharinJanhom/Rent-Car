<?php
require "libs/ApiHelper.php";

class User_manage extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function index() {
        Session::init();
        $user = Session::get("user");
        $customer=ApiHelper::callAPI("GET", URL_API . "/users/typeUser/CUSTOMER", "", $user->result);
        $admin =ApiHelper::callAPI("GET", URL_API . "/users/typeUser/ADMIN", "", $user->result);
        $company =	ApiHelper::callAPI("GET", URL_API . "/users/typeUser/COMPANY", "", $user->result);	
        $this->view->customer = $customer;
        $this->view->admin = $admin;
        $this->view->company =$company;
		$this->view->render('user_manage/index');
    }
    function create() {	
        print_r($_POST);
        $username = (isset($_POST['username'])) ? $username = $_POST['username'] : $username = null;
        $password = (isset($_POST['password'])) ? $password = $_POST['password'] : $password = null;
        $fname = (isset($_POST['name'])) ? $fname = $_POST['name'] : $fname = null;
        $lname = (isset($_POST['surname'])) ? $lname = $_POST['surname'] : $lname = null;
        $typeUser = (isset($_POST['typeUser'])) ? $typeUser = $_POST['typeUser'] : $typeUser = null;
        $address = (isset($_POST['address'])) ? $address = $_POST['address'] : $address = null;
        $phoneNumber = (isset($_POST['phoneNumber'])) ? $phoneNumber = $_POST['phoneNumber'] : $phoneNumber = null;
        $companyName = (isset($_POST['companyName'])) ? $companyName = $_POST['companyName'] : $companyName = null;
        $data = array(
            "username" => $username,
            "password" =>  $password,
            "fname" =>  $fname,
            "lname" =>  $lname,
            "typeUser" => $typeUser,
            "address" => $address,
            "phoneNumber" => $phoneNumber,
            "companyName" => $companyName    
        );
        Session::init();
        $user = Session::get("user");
        try {
            $res=ApiHelper::callAPI("POST", URL_API . "/users", json_encode($data), $user->result);
        } catch (exception $e) {
            $res = false;
        }
        header("Location:".URL."user_manage");
    }	
		
}