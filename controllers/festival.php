<?php
require "libs/ApiHelper.php";
class Festival extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('festival/index');
    }

    public function search()
    {
        $ticket_id = $_POST['ticket_id'];
        $ticket = ApiHelper::callAPI("GET", URL_API_MUSIC . "/tickets/serialNumber/$ticket_id", "");
        header('Content-type: application/json');
        print $ticket;
    }

}
