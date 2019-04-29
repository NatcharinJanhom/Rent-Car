<?php
require "libs/ApiHelper.php";

class Register extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('register/index');
    }

    public function register_insert()
    {
        $data = array(
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "fname" => $_POST['name'],
            "lname" => $_POST['surname'],
            "address" => "21/1 ซ.2",
            "phoneNumber" => "0818515125",
        );
        $result = ApiHelper::callAPI("POST", URL_API . "/users/registers", json_encode($data));
        print_r($result);
        //$result = json_decode($result);

    }
}
