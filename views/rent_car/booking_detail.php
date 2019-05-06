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

    .img-fluid-car {
        max-width: 400px;
        max-height: 200px;
        width: 100%;
        height: 100%;
    }

    .pointer {
        cursor: pointer;
    }
</style>
<script>
    function history_Back(num) {
        window.history.go(num);
    }
</script>
<?php $detail = json_decode($this->booking_detail); ?>
<?php
if (isset($this->api_detail)) {
    $api_detail = json_decode($this->api_detail);
    print_r($api_detail);
}
?>
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item active">
                        <span class="text-primary ">ผลการค้นหา</span>
                    </li>
                    <li class="breadcrumb-item active">
                        <span class="text-primary ">รายละเอียดรถ</span>
                    </li>
                    <li class="breadcrumb-item " aria-current="page">
                        <span class="text-primary">เสร็จสิ้น</span>
                    </li>
                </ol>
            </nav>
            <h3><span><i class="fa fa-check-circle"></i></span> การจองเสร็จสิ้น </h3>
            <!-- <span class="badge badge-warning"><i class="fa fa-history"></i> รอการติดต่อกลับจากบริษัทรถเช่า</span> -->
            <h3>รหัสการจองของคุณคือ <span class="text-primary"><?php echo $detail->rentSearch ?> </span> </h3>
            <div class="card mb-4">
                <div class="card-body">
                    <p align="right">สถานะการจอง</p>
                    <p align="right" class="text-warning" style="font-size:20px;"><?php echo $detail->status ?></p>
                    <hr>
                    <div class="row">
                        <?php if ($detail->car->typeCar == "รถเก๋ง" && $detail->car->brand == "Honda") : ?>
                            <div class=" col-md-4">
                                <a href="#">
                                    <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_civic.png" alt="">
                                </a>
                            </div>
                        <?php elseif ($detail->car->typeCar == "รถเก๋ง" && $detail->car->brand == "Toyota") : ?>
                            <div class=" col-md-4">
                                <a href="#">
                                    <img class="img-fluid-car" src="<?php echo URL ?>image/2018-Toyota-Camry-Banner-Image-.png" alt="">
                                </a>
                            </div>
                        <?php elseif ($detail->car->typeCar == "รถเก๋ง" && $detail->car->brand == "Mercedes-Benz") : ?>
                            <div class=" col-md-4">
                                <a href="#">
                                    <img class="img-fluid-car" src="<?php echo URL ?>image/benz.png" alt="">
                                </a>
                            </div>
                        <?php elseif ($detail->car->typeCar == "รถเก๋ง" && $detail->car->brand == "Hyundai") : ?>
                            <div class=" col-md-4">
                                <a href="#">
                                    <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai.jpg" alt="">
                                </a>
                            </div>
                        <?php elseif ($detail->car->typeCar == "รถกระบะ") : ?>
                            <div class=" col-md-4">
                                <a href="#">
                                    <img class="img-fluid-car" src="<?php echo URL ?>image/super-white-revo.png" alt="">
                                </a>
                            </div>
                        <?php elseif ($detail->car->typeCar == "รถตู้" && $detail->car->brand == "Toyota") : ?>
                            <div class=" col-md-4">
                                <a href="#">
                                    <img class="img-fluid-car" src="<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png" alt="">
                                </a>
                            </div>
                        <?php elseif ($detail->car->typeCar == "รถตู้" && $detail->car->brand == "Hyundai") : ?>
                            <div class=" col-md-4">
                                <a href="#">
                                    <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai_H1.jpg" alt="">
                                </a>
                            </div>
                        <?php elseif ($detail->car->typeCar == "รถจักรยานยนต์") : ?>
                            <div class=" col-md-4">
                                <a href="#">
                                    <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                                </a>
                            </div>
                        <?php elseif ($detail->car->typeCar == "รถทัวร์") : ?>
                            <div class=" col-md-4">
                                <a href="#">
                                    <img class="img-fluid-car" src="<?php echo URL ?>image/original-1416034605429.jpg" alt="">
                                </a>
                            </div>

                        <?php endif; ?>
                        <div class="col-md-3">
                            <p><?php echo $detail->car->brand ?></p>
                            <p><span><i class="fa fa-car"></i></span> <?php echo $detail->car->typeCar ?> <span><i class="fa fa-user"></i></span> <?php echo $detail->car->seatCount ?> </p>
                        </div>
                        <div class="col-md-5">
                            <?php date_default_timezone_set('Asia/Bangkok'); ?>
                            <p>สถานที่รับรถ-คืนรถ</p>
                            <div class="row">
                                <div class="col-md-5">
                                    <p id="title-text"><span><i class="fa fa-calendar-alt"></i></span> รับรถ</p>
                                    <p><?php echo $detail->car->provinceByAddressProvince->name ?></p>
                                    <p class="m-0"><?php echo date("d/m/Y", substr($detail->startDate, 0, -3)); ?> </p>
                                </div>
                                <span><i class="fa fa-arrow-right"></i></span>
                                <div class="col-md-5 ml-5">
                                    <p id="title-text"><span><i class="fa fa-calendar-alt"></i></span> คืนรถ</p>
                                    <p><?php echo $detail->car->provinceByAddressProvince->name ?></p>
                                    <p class="m-0"><?php echo date("d/m/Y", substr($detail->endDate, 0, -3)); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <p>บัตรฟรี!</p>
                    <hr>
                    <p>บัตรเข้าร่วมงาน <?php echo $api_detail->result[0]->festival->nameFes ?></p>
                    <p>สถานที่ <?php echo $api_detail->result[0]->festival->location . " จังหวัด " . $api_detail->result[0]->festival->province; ?></p>
                    <p class="m-0">วันที่ <?php echo date("d/m/Y", substr($api_detail->result[0]->festival->date, 0, -3)); ?></p>
                    <p>หมายเลขบัตร</p>
                    <?php foreach ($api_detail->result as $key => $value) : ?>
                        <p><?php echo ($key + 1) ?>. <span class="text-primary"><?php echo $value->serialNumber; ?></span> <?php echo $value->festival->nameFes?></p>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>