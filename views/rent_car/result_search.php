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

    .fa.fa-car,
    .fa.fa-user {
        font-size: 20px;
    }

    .img-fluid-car {
        max-width: 400px;
        max-height: 200px;
        width: 100%;
        height: 100%;
    }
</style>

<header>
    <?php $province = $this->province; ?>
    <?php $data_search = $this->data_search; ?>
    <?php $province = json_decode($province); ?>
    <?php $carList = json_decode($this->carList); ?>
    <form id="search_car" class="row pad-10" action="<?php echo URL ?>rent/search_car">
        <div class="col-1 col-md-1 col-lg-1">
        </div>
        <div class="col-3 col-md-3 col-lg-3">
            <label for="provine_id">จังหวัด</label>
            <select class="form-control" id="provine_id" name="provine_id">
                <option value=""> เลือกจังหวัด </option>
                <?php if ($province->status == "200") :
                    foreach ($province->result as $key => $value) {
                        if ($data_search['provine_id'] != $value->provinceId) {
                            echo "<option value='$value->provinceId'> " . $value->name . " </option>";
                        } else {
                            echo "<option value='$value->provinceId' selected> $value->name </option>";
                        }
                    }
                    ?>

                <?php endif; ?>
            </select>
        </div>

        <div class="col-3 col-md-3 col-lg-3">
            <label for="exampleInputPassword4"> วันที่รับรถ </label>
            <div id="pick-up" class="input-group date datepicker datepicker-popup">
                <input type="text" class="form-control" id="start_date" name="start_date" value=<?php echo ymd_TO_dmy($data_search['start_date']); ?>>
                <span class="input-group-addon input-group-append border-left">
                    <span class="fa fa-calendar-alt input-group-text"></span>
                </span>
            </div>
        </div>
        <div class="col-3 col-md-3 col-lg-3">
            <label for="exampleInputCity1"> วันที่คืนรถ </label>
            <div id="return" class="input-group date datepicker datepicker-popup">
                <input type="text" class="form-control" id="end_date" name="end_date" value="<?php echo ymd_TO_dmy($data_search['end_date']); ?>">
                <span class="input-group-addon input-group-append border-left">
                    <span class="fa fa-calendar-alt input-group-text"></span>
                </span>
            </div>
        </div>
        <div class="col-2 col-md-2 col-lg-2">
            <button type="button" class="btn btn-success mr-top-32 btn_search_car"> ค้นหารถเช่า <i class="pad-left-5 fa fa-check"></i></button>
        </div>
    </form>

</header>

<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item">
                        <span class="text-primary">ผลการค้นหา</span>
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
                    <div class="row mb-4">
                        <div class="col-lg-9 col-md-9">
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <select class="form-control">
                                <option>เรียงราคา น้อย - มาก</option>
                                <option>เรียงราคา มาก - น้อย</option>
                            </select>
                        </div>
                    </div>

                    <?php foreach ($carList->result as $key => $value) : ?>
                        <?php
                        echo "<hr>";
                        ?>

                        <div class="row mb-2">
                            <?php if ($value->typeCar == "รถเก๋ง") : ?>
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/2016_09_29_Nissan_Micra_1.jpg" alt="">
                                    </a>
                                </div>
                            <?php elseif ($value->typeCar == "รถกระบะ") : ?>
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/super-white-revo.png" alt="">
                                    </a>
                                </div>
                            <?php elseif ($value->typeCar == "รถตู้") : ?>
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png" alt="">
                                    </a>
                                </div>
                            <?php elseif ($value->typeCar == "รถจักรยานยนต์") : ?>
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                                    </a>
                                </div>
                            <?php elseif ($value->typeCar == "รถจักรยานยนต์") : ?>
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                                    </a>
                                </div>
                            <?php elseif ($value->typeCar == "รถทัวร์") : ?>
                                <div class="col-lg-4 col-md-4">
                                    <a href="#">
                                        <img class="img-fluid-car" src="<?php echo URL ?>image/original-1416034605429.jpg" alt="">
                                    </a>
                                </div>

                            <?php endif; ?>
                            <div class="col-lg-8 col-md-8">
                                <p><?php echo $value->brand; ?> </p>
                                <p><span><i class="fa fa-car"></i></span> <?php echo $value->typeCar ?> <span><i class="fa fa-user"></i></span> <?php echo $value->seatCount ?> </p>
                                <hr>
                                <h4><span>฿ </span><?php echo $value->price ?> / วัน</h4>
                                <button type="button" class="btn btn-primary car-detail" data-carId="<?php echo $value->carId ?>" data-provine_id="<?php echo $data_search['provine_id'] ?>" data-start_date="<?php echo $data_search['start_date'] ?>" data-end_date="<?php echo $data_search['end_date'] ?>">รายละเอียดเพิ่มเติม</button>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<form id="form_data_search" method="GET" action="<?php echo URL ?>rent/detail_car">
    <input type="hidden" id="detail_provine_id" name="provine_id" value="">
    <input type="hidden" id="detail_start_date" name="start_date" value="">
    <input type="hidden" id="detail_end_date" name="end_date" value="">
    <input type="hidden" id="detail_carId" name="carId" value="">
</form>
<script>
    (function($) {
        'use strict';
        $('.datepicker-popup').datepicker({
            enableOnReadonly: true,
            todayHighlight: true,
            format: "dd/mm/yyyy"
        });
        // var today = new Date();
        // var tomorrow = new Date();
        // tomorrow.setDate(today.getDate() + 1);
        // $('#pick-up').datepicker('setDate', today);
        // $('#return').datepicker('setDate', tomorrow);
    })(jQuery);
</script>


<script>
    $(".btn_search_car").click(function() {
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();
        var province = $("#provine_id").val();
        if (province) {
            $("#search_car").submit();
        } else {
            alert("กรุณาเลือกจังหวัด");
        }


    });

    $(".car-detail").click(function() {
        var start_date = $(this).attr('data-start_date');
        var end_date = $(this).attr('data-end_date');
        var province = $(this).attr('data-provine_id');
        var carId = $(this).attr('data-carId');
        console.log(carId);
        $("#detail_provine_id").val(province);
        $("#detail_start_date").val(start_date);
        $("#detail_end_date").val(end_date);
        $("#detail_carId").val(carId);
        $("#form_data_search").submit();
    });
</script>