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

    .col-lg-2,
    .col-md-2,
    .col-lg-4,
    .col-md-4 {
        padding-right: unset;
        padding-left: unset;
    }

    p {
        padding-top: 0.25rem;
    }

    .text-warning {
        padding-top: 0px;
    }
</style>
<?php $list = json_decode($this->list); ?>
<?php date_default_timezone_set('Asia/Bangkok');  ?>
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <h3>รายการเช่ารถ</h3>
            <hr>
            <?php foreach ($list->result as $key => $value) :
                if ($key != 0)
                    echo "<hr>"; 
                if($value->status == "รอการยืนยัน")
                $status = "text-warning";
                elseif($value->status == "รอรับรถ")
                $status = "text-info";
                elseif($value->status == "รับรถแล้ว")
                $status = "text-success";
                elseif($value->status == "คืนรถแล้ว")
                $status = "text-primary";
                ?>

                <div class="row mb-2">
                    <div class="col-lg-2 col-md-2">
                        <p><span><i class="fa fa-car"></i> </span><?php echo $value->car->model; ?> (<?php echo $value->car->typeCar; ?>)</p>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <p>สถานที่รับ <?php echo $value->car->provinceByAddressProvince->name; ?></p>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <p><span><i class="fa fa-calendar-alt"></i> </span>วันที่รับ <?php echo  date("d/m/Y", substr($value->startDate, 0, -3)); ?>
                            <span><i class="fa fa-calendar-alt"></i> </span>วันที่คืน <?php echo  date("d/m/Y", substr($value->endDate, 0, -3)); ?></p>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <p>เบอร์โทรศัพท์
                            <?php
                            if (isset($value->user->phoneNumber))
                                echo $value->user->phoneNumber;
                            else
                                echo $value->phoneNumberNotMember;
                            ?></p>
                    </div>
                    <div class="col-lg-2 col-md-2">
                   <p class="<?php echo $status; ?> "><?php echo $value->status; ?>
                            <span><button type="button" class="btn btn-sm btn-light btn-change" data-status="<?php echo $value->status; ?>" data-rentId="<?php echo $value->rentId; ?>"><span><i class="fa fa-cogs"></i></span></button></span></p>
                    </div>
                </div>
            <?php endforeach; ?>
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
                <input type="hidden" id="rentId" name="rentId"  value="">
                <button type="button" class="btn btn-primary status_change">ยืนยัน</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(".row").on('click','.btn-change',function(){
        var status_rent = $(this).attr("data-status");
        var id = $(this).attr("data-rentId");
        $("#status_rent").val(status_rent);
        $("#rentId").val(id);
        $("#myModal").modal("show");     
    });

    $(".status_change").click(function(){
        var status_rent = $("#status_rent").val();
        var rentId =$("#rentId").val();
        $.ajax({
            url:"<?php echo URL ?>/manage_booking/update_status",
            method:"POST",
            data:{"status_rent" : status_rent,
                    "rentId": rentId},
            success:function(data){
                if(data)
                location.reload();
            },
            error:function(data){
                console.log(data);
            }
        });
    });
</script>