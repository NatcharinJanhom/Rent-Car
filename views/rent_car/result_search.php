<head>
    <title>HTML Reference</title>
</head>
<style>
    .mb-4 {
        margin-top: 1.5rem !important;
        margin-bottom: 1.5rem !important;
    }

    .pad-10 {
        padding: 10px;
    }

    .mr-top-32 {
        margin-top: 32px !important;
    }

    .datepicker {
        padding: 0px;
        border-radius: 4px;
        direction: ltr;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        display: inline-block;
        padding-right: .5rem;
        color: #6c757d;
        content: " >";
    }

    .bg-silver {
        background-color: #e9ecef;
    }
    .fa.fa-car , .fa.fa-user{
        font-size: 20px;
    }
</style>

<header>
    <form class="row pad-10" action="<?php echo URL ?>manage_booking/search_car">
        <div class="col-1 col-md-1 col-lg-1">
        </div>
        <div class="col-3 col-md-3 col-lg-3">
            <label for="exampleInputName1">จังหวัด</label>
            <select class="form-control" id="exampleInputName1">
                <option> เลือกจังหวัด </option>
                <option> กรุงเทพ </option>
                <option> ภูเก็ต </option>
            </select>
        </div>
      
        <div class="col-3 col-md-3 col-lg-3">
            <label for="exampleInputPassword4"> วันที่รับรถ </label>
            <div id="pick-up" class="input-group date datepicker datepicker-popup">
                <input type="text" class="form-control">
                <span class="input-group-addon input-group-append border-left">
                    <span class="fa fa-calendar-alt input-group-text"></span>
                </span>
            </div>
        </div>
        <div class="col-3 col-md-3 col-lg-3">
            <label for="exampleInputCity1"> วันที่คืนรถ </label>
            <div id="return" class="input-group date datepicker datepicker-popup">
                <input type="text" class="form-control">
                <span class="input-group-addon input-group-append border-left">
                    <span class="fa fa-calendar-alt input-group-text"></span>
                </span>
            </div>
        </div>
        <div class="col-2 col-md-2 col-lg-2">
            <button type="submit" class="btn btn-success mr-top-32"> ค้นหารถเช่า <i class="pad-left-5 fa fa-check"></i></button>
        </div>
    </form>

</header>

<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item">
                        <a href="#breadcrumb">ผลการค้นหา</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <span>รายละเอียดรถ</span>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <span>เสร็จสิ้น</span>
                    </li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body  bg-silver">
                    <div class="row mb-4">
                        <div class="col-md-1">
                        </div>
                        <div class="col-md-2 col-sm-6 mb-2">
                            <a href="#">
                                <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                            </a>
                            <p style="text-align:center;"> รถกะบะ </p>
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                            <a href="#">
                                <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                            </a>
                            <p style="text-align:center;"> รถตู้</p>
                        </div>
                        <div class="col-md-2 col-sm-6  mb-2">
                            <a href="#">
                                <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                            </a>
                            <p style="text-align:center;"> รถเก๋ง</p>
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                            <a href="#">
                                <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                            </a>
                            <p style="text-align:center;"> รถบัส </p>
                        </div>
                        <div class="col-md-2 col-sm-6 ">
                            <a href="#">
                                <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                            </a>
                            <p style="text-align:center;"> รถจักรยานยนต์ </p>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <select class="form-control">
                                <option>เรียงราคา น้อย - มาก</option>
                                <option>เรียงราคา มาก - น้อย</option>
                            </select>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row mb-2">
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <p>Nissan March 2018</p>
                                    <p><span><i class="fa fa-car"></i></span> รถเก๋ง <span><i class="fa fa-user"></i></span> 5 </p>
                                    <hr>
                                    <h4><span>฿ </span>950 / วัน</h4>
                                    <a href="<?php echo URL?>manage_booking/detail_car" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <p>Toyota Hilux Revo 2017</p>
                                    <p><span><i class="fa fa-car"></i></span> รถกะบะ <span><i class="fa fa-user"></i></span> 5 </p>
                                    <hr>
                                    <h4><span>฿ </span>950 / วัน</h4>
                                    <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <p>Toyota Alphard 2018</p>
                                    <p><span><i class="fa fa-car"></i></span> รถตู้ <span><i class="fa fa-user"></i></span> 8 </p>
                                    <hr>
                                    <h4><span>฿ </span>950 / วัน</h4>
                                    <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-2">
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                                    </a>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <p>honda pcx150</p>
                                    <p><span><i class="fa fa-car"></i></span> รถจักรยานยนต์ <span><i class="fa fa-user"></i></span> 2 </p>
                                    <hr>
                                    <h4><span>฿ </span>400 / วัน</h4>
                                    <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    (function($) {
        'use strict';
        $('.datepicker-popup').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: "dd/mm/yyyy"
        });
        var today = new Date();
        var tomorrow = new Date();
        tomorrow.setDate(today.getDate() + 1);
        $('#pick-up').datepicker('setDate', today);
        $('#return').datepicker('setDate', tomorrow);
    })(jQuery);
</script>