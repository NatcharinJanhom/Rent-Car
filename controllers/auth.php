<?php
require "libs/ApiHelper.php";
class Auth extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('login/index');
    }

    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $data = array(
            'username' => $username,
            'password' => $password,
        );
        $user = ApiHelper::callAPI("POST", URL_API . "/auth/login", json_encode($data));
        $result = json_decode($user);
        if ($result->status == 200) {
            Session::init();
            Session::set('user', $result);
            header("location:" . URL . "home");
        } else {
            header("location:" . URL . "auth");
        }
    }

    public function logout()
    {
        Session::init();
        Session::destroy();
        header("location:" . URL . "auth");
    }

}
