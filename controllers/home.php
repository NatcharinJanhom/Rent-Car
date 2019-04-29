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
        $province = ApiHelper::callAPI("GET", URL_API . "/rest/services/provinces");
        $this->view->province = $province;
        $this->view->render('page/homepage');
    }
}
