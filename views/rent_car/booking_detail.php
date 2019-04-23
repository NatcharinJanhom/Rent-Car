<style>
    .mb-4 {
        margin-top: 1.5rem !important;
        margin-bottom: 1.5rem !important;
    }

    .fa-check-circle {
        color: green;
    }

    .badge.badge-warning {
        font-size: 17px;
        position: absolute;
        right: 1.25rem;
    }
</style>
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item active">
                        <a href="<?php echo URL ?>manage_booking/search_car">ผลการค้นหา</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="<?php echo URL ?>manage_booking/detail_car">รายละเอียดรถ</a>
                    </li>
                    <li class="breadcrumb-item " aria-current="page">
                        <a href="#breadcrumb">เสร็จสิ้น</a>
                    </li>
                </ol>
            </nav>
            <h3><span><i class="fa fa-check-circle"></i></span> การจองเสร็จสิ้น <span class="badge badge-warning"><i class="fa fa-history"></i> รอการติดต่อกลับจากบริษัทรถเช่า</span></h3>
            <div class="card mb-4">
                <div class="card-body">
                    <p align="right">สถานะการจอง</p>
                    <p align="right" class="text-warning" style="font-size:20px;">รอการยืนยัน</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <a href="#">
                                <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <p>Nissan March 2018</p>
                            <p><span><i class="fa fa-car"></i></span> รถเก๋ง <span><i class="fa fa-user"></i></span> 5 </p>
                        </div>
                        <div class="col-md-5">
                            <p>สถานที่รับรถ-คืนรถ</p>
                            <div class="row">
                                <div class="col-md-5">
                                    <p id="title-text"><span><i class="fa fa-calendar-alt"></i></span> รับรถ</p>
                                    <p class="m-0">23 เม.ย. 2019 </p>
                                </div>
                                <span><i class="fa fa-arrow-right"></i></span>
                                <div class="col-md-5 ml-5">
                                    <p id="title-text"><span><i class="fa fa-calendar-alt"></i></span> คืนรถ</p>
                                    <p class="m-0">25 เม.ย. 2019</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>