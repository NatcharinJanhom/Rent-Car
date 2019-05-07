<?php
require "libs/ApiHelper.php";
class Manage_Booking extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        Session::init();
        $user = Session::get("user");

        if ($user) {
            $temp = explode(".", $user->result);
            $data = json_decode(base64_decode($temp[1]));
            if ($data->typeUser == "ADMIN") {
                $list = ApiHelper::callAPI("GET", URL_API . "/rents", "", $user->result);
                $this->view->list = $list;
                $this->view->render('manage_booking/manage_booking_admin');
            } else {
                $temp = explode(".", $user->result);
                $data = json_decode(base64_decode($temp[1]));
                $list = ApiHelper::callAPI("GET", URL_API . "/rents/users/" . $data->userId, "", $user->result);
                $this->view->list = $list;
                $this->view->render('manage_booking/manage_booking_user');
            }
        } else {
            $this->view->render('manage_booking/booking_no_user');
        }
    }

    public function search()
    {
        $rent_search = (isset($_POST['rent_search'])) ? $rent_search = $_POST['rent_search'] : $rent_search = null;
        $booking_detail = ApiHelper::callAPI("GET", URL_API . "/rents/rentSearch/$rent_search");
        $res = json_decode($booking_detail);
        if (isset($res->status) && $res->status == "200") {
            $this->view->booking_detail = $booking_detail;
        } else {
            $this->view->booking_detail = null;
        }
        $this->view->render('manage_booking/booking_detail');
    }
    public function update_status()
    {
        $rentId = (isset($_POST['rentId'])) ? $rentId = $_POST['rentId'] : $rentId = null;
        $status_rent = (isset($_POST['status_rent'])) ? $status_rent = $_POST['status_rent'] : $status_rent = null;
        $data = array(
            "rentId" => $rentId,
            "status" => $status_rent,
        );
        Session::init();
        $user = Session::get("user");
        $check = false;
        try {
            ApiHelper::callAPI("PUT", URL_API . "/rents", json_encode($data), $user->result);
            $check = true;
        } catch (exception $e) {

            $check = false;
        }
        header('Content-type: application/json');
        print json_encode($check);
    }
    public function delete_rent()
    {
        $rentId = (isset($_POST['rentId'])) ? $rentId = $_POST['rentId'] : $rentId = null;
        $data = array(
            "rentId" => $rentId,
        );
        Session::init();
        $user = Session::get("user");
        $check = false;
        try {
            $result = ApiHelper::callAPI("DELETE", URL_API . "/rents", json_encode($data), $user->result);
            $result = json_decode($result);
           
            if ($result->status == "200") {
                $check = true;
            } else {
                $check = false;
            }
        } catch (exception $e) {
            $check = false;
        }
        header('Content-type: application/json');
        print $check;
    }
}
