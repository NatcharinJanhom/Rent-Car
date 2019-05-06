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
<?php $list = json_decode($this->list);?>
<?php date_default_timezone_set('Asia/Bangkok');?>
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <h3>รายการเช่ารถ</h3>
            <hr>
            <?php if (isset($list->result)): ?>
                <?php foreach ($list->result as $key => $value):
    if ($key != 0) {
        echo "<hr>";
    }

    if ($value->status == "รอการยืนยัน") {
        $status = "text-warning";
    } elseif ($value->status == "รอรับรถ") {
    $status = "text-info";
} elseif ($value->status == "รับรถแล้ว") {
    $status = "text-success";
} elseif ($value->status == "คืนรถแล้ว") {
    $status = "text-primary";
}

?>

                    <div class="row mb-2">
                        <div class="col-lg-2 col-md-2">
                            <p><span><i class="fa fa-car"></i> </span><?php echo $value->car->model; ?> (<?php echo $value->car->typeCar; ?>)</p>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <p><span><i class="fa fa-map-marker-alt"></i> </span><?php echo $value->car->provinceByAddressProvince->name; ?></p>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <p><span><i class="fa fa-calendar-alt"></i> </span>วันที่รับ <?php echo date("d/m/Y", substr($value->startDate, 0, -3)); ?>
                                <span><i class="fa fa-calendar-alt"></i> </span>วันที่คืน <?php echo date("d/m/Y", substr($value->endDate, 0, -3)); ?></p>
                        </div>
                        <div class="col-lg-1 col-md-1">
                            <p><span><i class="fa fa-phone"></i> </span>
                                <?php
if (isset($value->user->phoneNumber)) {
    echo $value->user->phoneNumber . "<br/>(" . $value->user->fname . " " . $value->user->lname . ")";
} else {
    echo $value->phoneNumberNotMember . "<br/>(" . $value->fname . " " . $value->lname . ")";
}

?></p>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <p>เลขที่จอง : <span class="text-primary"><?php echo $value->rentSearch; ?> </span></p>
                        </div>
                        <div class="col-lg-2 col-md-2">
                            <p class="<?php echo $status; ?> "><?php echo $value->status; ?>
                                <span><button type="button" class="btn btn-sm btn-light btn-change" data-status="<?php echo $value->status; ?>" data-rentId="<?php echo $value->rentId; ?>"><span><i class="fa fa-cogs"></i></span></button></span>
                                <span><button type="button" class="btn btn-sm btn-danger btn-delete" data-typeCar="<?php echo $value->car->typeCar; ?>" data-model="<?php echo $value->car->model; ?>" data-rentId="<?php echo $value->rentId; ?>" data-rentSearch="<?php echo $value->rentSearch; ?>"><span><i class="fa fa-times"></i></span></button></span></p>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขสถานะ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" id="rent-car" action="<?php echo URL ?>rent/booking">
                    <div class="form-group">
                        <label for="provine_id">สถานะ</label>
                        <select class="form-control" id="status_rent" name="status_rent">
                            <option value="รอการยืนยัน">รอการยืนยัน</option>
                            <option value="รอรับรถ">รอรับรถ</option>
                            <option value="รับรถแล้ว">รับรถแล้ว</option>
                            <option value="คืนรถแล้ว">คืนรถแล้ว</option>
                        </select>
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" id="rentId" name="rentId" value="">
                <button type="button" class="btn btn-primary status_change">ยืนยัน</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".row").on('click', '.btn-change', function() {
            var status_rent = $(this).attr("data-status");
            var id = $(this).attr("data-rentId");
            $("#status_rent").val(status_rent);
            $("#rentId").val(id);
            $("#myModal").modal("show");
        });

        $(".status_change").click(function() {
            var status_rent = $("#status_rent").val();
            var rentId = $("#rentId").val();
            $.ajax({
                url: "<?php echo URL ?>/manage_booking/update_status",
                method: "POST",
                data: {
                    "status_rent": status_rent,
                    "rentId": rentId
                },
                success: function(data) {
                    if (data) {
                        swal({
                            title: 'Success',
                            text: "แก้ไขสถานะ สำเร็จ",
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
        });

        $(".row").on('click', '.btn-delete', function() {
            var id = $(this).attr("data-rentId");
            var typeCar = $(this).attr("data-typeCar");
            var model = $(this).attr("data-model");
            var rentSearch = $(this).attr("data-rentSearch");
            swal({
                    title: "คุณแน่ใจว่าต้องการลบ ?",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                    content: {
                        element: "p",
                        attributes: {
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
                                        text: "ลบสำเร็จ",
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
    });
</script>