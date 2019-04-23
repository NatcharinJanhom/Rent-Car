<style>
    .breadcrumb-item+.breadcrumb-item::before {
        display: inline-block;
        padding-right: .5rem;
        color: #6c757d;
        content: " >";
    }

    .bg-orange {
        background-color: #fcf8e3;
    }

    .fa.fa-car,
    .fa.fa-user {
        font-size: 20px;
    }

    .page2 {
        font-size: 50px;
    }

    .zero-right {
        text-align: right;
    }

    .font-size-15 {
        font-size: 15px;
    }

    p {
        margin-bottom: 0rem;
    }

    .font-weight-500 {
        font-weight: bold;
    }
</style>
<div class="container">
    <div class="card mt-4 mb-4">
        <div class="card-body">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item active">
                        <a href="<?php echo URL ?>manage_booking/search_car">ผลการค้นหา</a>
                    </li>
                    <li class="breadcrumb-item " aria-current="page">
                        <a href="#breadcrumb">รายละเอียดรถ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <span>เสร็จสิ้น</span>
                    </li>
                </ol>
            </nav>
            <h3>Nissan March 2018</h3>
            <div class="row mb-2">
                <div class="col-lg-6 col-md-6">
                    <a href="#">
                        <img class="img-fluid" src="http://placehold.it/400x300" alt="">
                    </a>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="row ">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3" align="left">
                            <p>รับรถ</p>
                            <p>กรุงเทพ</p>
                            <p>23 เม.ย. 2019</p>
                        </div>
                        <div class="col-md-2">
                            <span class="page2"> > </span>
                        </div>
                        <div class="col-md-3" align="left">
                            <p>คืนรถ</p>
                            <p>กรุงเทพ</p>
                            <p>25 เม.ย. 2019</p>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p>23 เม.ย. 2019 - 25 เม.ย. 2019 </p>
                        </div>
                        <div class="col-md-6 zero-right" align="right">
                            2 วัน x ฿950

                        </div>
                    </div>
                    <hr>
                    <div class="row font-size-15">
                        <div class="col-md-6">
                            <p>ค่ารับ - ส่งรถ</p>
                        </div>
                        <div class="col-md-6 zero-right" align="right">
                            <p class="text-danger">ฟรี!</p>

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p class=" font-weight-500"> ราคารวม </p>
                        </div>
                        <div class="col-md-6" align="right">
                            <p class=" font-weight-500"> ฿ 1900 </p>

                        </div>
                    </div>
                    <hr>
                    <div class="bg-orange mb-2" style="padding:10px;">
                        <div class="row no-border pb-0">
                            <div class="col-auto mr-auto"><b style="font-size: 13px;"><i class="fa fa-shield-alt"></i>ค่ามัดจำเพื่อประกันความเสียหาย</b></div>
                            <div class="col-auto" style="text-align: right; padding-right: 10px;"><b>฿5,000</b></div>
                        </div>
                        <div class="row no-border pt-0">
                            <div class="col-auto mr-auto pr-0"><small>ชำระ ณ วันที่รับรถเช่า และได้รับคืนเมื่อสิ้นสุดการเช่า</small></div>
                        </div>
                    </div>
                    <div align="right">
                        <a href="<?php echo URL ?>manage_booking/booking" class="btn btn-primary">เลือกรถคันนี้</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>