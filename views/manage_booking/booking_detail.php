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
    .img-fluid-car{
        max-width: 400px;
        max-height: 200px;
        width:100%;
        height:100%;
    }
    .pointer {cursor: pointer;}
</style>
<script>
function history_Back(num) {
  window.history.go(num);
}
</script>
<?php $detail = json_decode($this->booking_detail);
?>
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <h3><span><i class="fa fa-check-circle"></i></span> การจองเสร็จสิ้น </h3>
            <!-- <span class="badge badge-warning"><i class="fa fa-history"></i> รอการติดต่อกลับจากบริษัทรถเช่า</span> -->
            <h3>รหัสการจองของคุณคือ <span class="text-primary"><?php echo  $detail->result->rentSearch?> </span> </h3>
            <div class="card mb-4">
                <div class="card-body">
                    <p align="right">สถานะการจอง</p>
                    <p align="right" class="text-warning" style="font-size:20px;"><?php echo  $detail->result->status?></p>
                    <hr>
                    <div class="row">
                    <?php if (  $detail->result->car->typeCar == "รถเก๋ง") : ?>
                                <div class=" col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/2016_09_29_Nissan_Micra_1.jpg" alt="">
                                    </a>
                                </div>
                            <?php elseif (  $detail->result->car->typeCar == "รถกระบะ") : ?>
                                <div class=" col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/super-white-revo.png" alt="">
                                    </a>
                                </div>
                            <?php elseif (  $detail->result->car->typeCar == "รถตู้") : ?>
                                <div class=" col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png" alt="">
                                    </a>
                                </div>
                            <?php elseif (  $detail->result->car->typeCar == "รถจักรยานยนต์") : ?>
                                <div class=" col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                                    </a>
                                </div>
                            <?php elseif (  $detail->result->car->typeCar == "รถจักรยานยนต์") : ?>
                                <div class=" col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                                    </a>
                                </div>
                            <?php elseif (  $detail->result->car->typeCar == "รถทัวร์") : ?>
                                <div class=" col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/original-1416034605429.jpg" alt="">
                                    </a>
                                </div>

                            <?php endif; ?>
                        <div class="col-md-3">
                            <p><?php echo  $detail->result->car->brand?></p>
                            <p><span><i class="fa fa-car"></i></span> <?php echo  $detail->result->car->typeCar?> <span><i class="fa fa-user"></i></span> <?php echo  $detail->result->car->seatCount?> </p>
                        </div>
                        <div class="col-md-5">
                            <?php date_default_timezone_set('Asia/Bangkok');  ?>
                            <p>สถานที่รับรถ-คืนรถ</p>
                            <div class="row">
                                <div class="col-md-5">
                                    <p id="title-text"><span><i class="fa fa-calendar-alt"></i></span> รับรถ</p>
                                    <p><?php echo  $detail->result->car->provinceByAddressProvince->name?></p>
                                    <p class="m-0"><?php echo  date("d/m/Y",substr( $detail->result->startDate,0,-3));?> </p>
                                </div>
                                <span><i class="fa fa-arrow-right"></i></span>
                                <div class="col-md-5 ml-5">
                                    <p id="title-text"><span><i class="fa fa-calendar-alt"></i></span> คืนรถ</p>
                                    <p><?php echo  $detail->result->car->provinceByAddressProvince->name?></p>
                                    <p class="m-0"><?php echo  date("d/m/Y",substr( $detail->result->endDate,0,-3));?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>