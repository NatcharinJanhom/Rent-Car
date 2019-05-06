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

    .row {
        text-align: center;
    }

    .col-lg-1,
    .col-md-1,
    .col-lg-2,
    .col-md-2,
    .col-lg-4,
    .col-md-4,
    .col-lg-3,
    .col-md-3 {
        padding-right: unset;
        padding-left: unset;
    }

    p {
        padding-top: 0.25rem;
    }

    .text-warning {
        padding-top: 0px;
    }

    @media (min-width: 1200px) {
        .container {
            max-width: 1400px;
        }
    }
</style>
<?php $list = json_decode($this->list); ?>
<?php date_default_timezone_set('Asia/Bangkok');  ?>
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <?php if (isset($list->result)) : ?>
                <?php if (count($list->result) > 1) : ?>
                    <h3>รายการเช่ารถ</h3>
                    <hr>

                    <?php foreach ($list->result as $key => $value) :
                        if ($key != 0)
                            echo "<hr>";
                        if ($value->status == "รอการยืนยัน")
                            $status = "text-warning";
                        elseif ($value->status == "รอรับรถ")
                            $status = "text-info";
                        elseif ($value->status == "รับรถแล้ว")
                            $status = "text-success";
                        elseif ($value->status == "คืนรถแล้ว")
                            $status = "text-primary";
                        ?>

                        <div class="row mb-2">
                            <div class="col-lg-2 col-md-2">
                                <p><span><i class="fa fa-car"></i> </span><?php echo $value->car->model; ?> (<?php echo $value->car->typeCar; ?>)</p>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <p><span><i class="fa fa-map-marker-alt"></i> </span><?php echo $value->car->provinceByAddressProvince->name; ?></p>
                            </div>
                            <div class="col-lg-3 col-md-3">
                                <p><span><i class="fa fa-calendar-alt"></i> </span>วันที่รับ <?php echo  date("d/m/Y", substr($value->startDate, 0, -3)); ?>
                                    <span><i class="fa fa-calendar-alt"></i> </span>วันที่คืน <?php echo  date("d/m/Y", substr($value->endDate, 0, -3)); ?></p>
                            </div>
                            <div class="col-lg-1 col-md-1">
                                <p><span><i class="fa fa-phone"></i> </span>
                                    <?php
                                    if (isset($value->user->phoneNumber))
                                        echo $value->user->phoneNumber;
                                    else
                                        echo $value->phoneNumberNotMember;
                                    ?></p>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <p>เลขที่จอง : <span class="text-primary"><?php echo $value->rentSearch; ?> </span></p>
                            </div>
                            <div class="col-lg-2 col-md-2">
                                <p class="<?php echo $status; ?> "><?php echo $value->status; ?>
                                    <?php if ($value->status == "รอการยืนยัน") : ?>
                                        <span><button type="button" class="btn btn-sm btn-danger btn-delete" data-typeCar="<?php echo $value->car->typeCar; ?>" data-model="<?php echo $value->car->model; ?>" data-rentId="<?php echo $value->rentId; ?>" data-rentSearch="<?php echo $value->rentSearch; ?>"><span><i class="fa fa-times"></i></span></button></span>
                                    <?php endif; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php elseif(count($list->result) > 0): ?>
                    <h3><span><i class="fa fa-check-circle"></i></span> การจองเสร็จสิ้น </h3>
                    <!-- <span class="badge badge-warning"><i class="fa fa-history"></i> รอการติดต่อกลับจากบริษัทรถเช่า</span> -->
                    <h3>รหัสการจองของคุณคือ <span class="text-primary"><?php echo  $list->result[0]->rentSearch ?> </span> </h3>
                    <div class="card mb-4">
                        <div class="card-body">
                            <p align="right">สถานะการจอง</p>
                            <p align="right" class="text-warning" style="font-size:20px;"><?php echo  $list->result[0]->status ?></p>
                            <hr>
                            <div class="row">
                                <?php if ($list->result[0]->car->typeCar == "รถเก๋ง") : ?>
                                    <div class=" col-md-4">
                                        <a href="#">
                                            <img class="img-fluid-car" src="<?php echo URL ?>image/2016_09_29_Nissan_Micra_1.jpg" alt="">
                                        </a>
                                    </div>
                                <?php elseif ($list->result[0]->car->typeCar == "รถกระบะ") : ?>
                                    <div class=" col-md-4">
                                        <a href="#">
                                            <img class="img-fluid-car" src="<?php echo URL ?>image/super-white-revo.png" alt="">
                                        </a>
                                    </div>
                                <?php elseif ($list->result[0]->car->typeCar == "รถตู้") : ?>
                                    <div class=" col-md-4">
                                        <a href="#">
                                            <img class="img-fluid-car" src="<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png" alt="">
                                        </a>
                                    </div>
                                <?php elseif ($list->result[0]->car->typeCar == "รถจักรยานยนต์") : ?>
                                    <div class=" col-md-4">
                                        <a href="#">
                                            <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                                        </a>
                                    </div>
                                <?php elseif ($list->result[0]->car->typeCar == "รถจักรยานยนต์") : ?>
                                    <div class=" col-md-4">
                                        <a href="#">
                                            <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                                        </a>
                                    </div>
                                <?php elseif ($list->result[0]->car->typeCar == "รถทัวร์") : ?>
                                    <div class=" col-md-4">
                                        <a href="#">
                                            <img class="img-fluid-car" src="<?php echo URL ?>image/original-1416034605429.jpg" alt="">
                                        </a>
                                    </div>

                                <?php endif; ?>
                                <div class="col-md-3">
                                    <p><?php echo  $list->result[0]->car->brand ?></p>
                                    <p><span><i class="fa fa-car"></i></span> <?php echo  $list->result[0]->car->typeCar ?> <span><i class="fa fa-user"></i></span> <?php echo  $list->result[0]->car->seatCount ?> </p>
                                </div>
                                <div class="col-md-5">
                                    <?php date_default_timezone_set('Asia/Bangkok');  ?>
                                    <p>สถานที่รับรถ-คืนรถ</p>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <p id="title-text"><span><i class="fa fa-calendar-alt"></i></span> รับรถ</p>
                                            <p><?php echo  $list->result[0]->car->provinceByAddressProvince->name ?></p>
                                            <p class="m-0"><?php echo  date("d/m/Y", substr($list->result[0]->startDate, 0, -3)); ?> </p>
                                        </div>
                                        <span><i class="fa fa-arrow-right"></i></span>
                                        <div class="col-md-5 ml-5">
                                            <p id="title-text"><span><i class="fa fa-calendar-alt"></i></span> คืนรถ</p>
                                            <p><?php echo  $list->result[0]->car->provinceByAddressProvince->name ?></p>
                                            <p class="m-0"><?php echo  date("d/m/Y", substr($list->result[0]->endDate, 0, -3)); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php else: ?>
                    <h4> ไม่พบการจอง </h4>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
</div>
<script>
    $(".row").on('click', '.btn-delete', function() {
        var id = $(this).attr("data-rentId");
        var typeCar = $(this).attr("data-typeCar");
        var model = $(this).attr("data-model");
        var rentSearch = $(this).attr("data-rentSearch");
        swal({
                title: "Are you sure Delete?",
                icon: "error",
                buttons: true,
                dangerMode: true,
                content: {
                    element: "i",
                    attributes: {
                        className: "fa fa-car",
                        innerText: model + "(" + typeCar + ")" + "  " + rentSearch
                    },
                },
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "<?php echo URL ?>/manage_booking/delete_rent",
                        method: "POST",
                        data: {
                            "rentId": id
                        },
                        success: function(data) {
                            if (data) {
                                swal({
                                    title: 'Success',
                                    text: "ลบ สำเร็จ",
                                    icon: "success",
                                    buttons: false,
                                    timer: 1000
                                }).then(function() {
                                    location.reload(true);
                                });

                            }

                        },
                        error: function(data) {
                            console.log(data);
                        }
                    });
                }
            });
    });
</script>