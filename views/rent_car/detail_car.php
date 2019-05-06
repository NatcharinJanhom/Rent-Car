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

    .img-fluid-car {
        max-width: 400px;
        max-height: 200px;
        width: 100%;
        height: 100%;
    }

    .pointer {
        cursor: pointer;
    }

    .img-fluid-car {
        max-width: 400px;
        max-height: 200px;
        width: 100%;
        height: 100%;
    }
</style>
<?php $car = json_decode($this->car);
$data_search = $this->data_search;
?>
<div class="container">
    <div class="card mt-4 mb-4">
        <div class="card-body">
            <nav aria-label="breadcrumb" id="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item active">
                        <span class="text-primary pointer" onclick="history_Back()">ผลการค้นหา</span>
                    </li>
                    <li class="breadcrumb-item " aria-current="page">
                        <span class="text-primary">รายละเอียดรถ</span>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <span>เสร็จสิ้น</span>
                    </li>
                </ol>
            </nav>
            <h3><?php echo $car->result->brand; ?></h3>
            <div class="row mb-2">
                <?php if ($car->result->typeCar == "รถเก๋ง" && $car->result->brand == "Honda") : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="#">
                            <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_civic.png" alt="">
                        </a>
                    </div>
                <?php elseif ($car->result->typeCar == "รถเก๋ง" && $car->result->brand == "Toyota") : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="#">
                            <img class="img-fluid-car" src="<?php echo URL ?>image/2018-Toyota-Camry-Banner-Image-.png" alt="">
                        </a>
                    </div>
                <?php elseif ($car->result->typeCar == "รถเก๋ง" && $car->result->brand == "Mercedes-Benz") : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="#">
                            <img class="img-fluid-car" src="<?php echo URL ?>image/benz.png" alt="">
                        </a>
                    </div>
                <?php elseif ($car->result->typeCar == "รถเก๋ง" && $car->result->brand == "Hyundai") : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="#">
                            <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai.jpg" alt="">
                        </a>
                    </div>
                <?php elseif ($car->result->typeCar == "รถกระบะ") : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="#">
                            <img class="img-fluid-car" src="<?php echo URL ?>image/super-white-revo.png" alt="">
                        </a>
                    </div>
                <?php elseif ($car->result->typeCar == "รถตู้" && $car->result->brand == "Toyota") : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="#">
                            <img class="img-fluid-car" src="<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png" alt="">
                        </a>
                    </div>
                <?php elseif ($car->result->typeCar == "รถตู้" && $car->result->brand == "Hyundai") : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="#">
                            <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai_H1.jpg" alt="">
                        </a>
                    </div>
                <?php elseif ($car->result->typeCar == "รถจักรยานยนต์") : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="#">
                            <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                        </a>
                    </div>
                <?php elseif ($car->result->typeCar == "รถทัวร์") : ?>
                    <div class="col-lg-6 col-md-6">
                        <a href="#">
                            <img class="img-fluid-car" src="<?php echo URL ?>image/original-1416034605429.jpg" alt="">
                        </a>
                    </div>

                <?php endif; ?>
                <div class="col-lg-6 col-md-6">
                    <div class="row ">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-3" align="left">
                            <p>รับรถ</p>
                            <p><?php echo $car->result->provinceByAddressProvince->name; ?></p>
                            <p><?php echo ymd_TO_dmy($data_search['start_date']); ?></p>
                        </div>
                        <div class="col-md-2">
                            <span class="page2"> > </span>
                        </div>
                        <div class="col-md-3" align="left">
                            <p>คืนรถ</p>
                            <p><?php echo $car->result->provinceByAddressProvince->name; ?></p>
                            <p><?php echo ymd_TO_dmy($data_search['end_date']); ?></p>
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong><?php echo ymd_TO_dmy($data_search['start_date']); ?> - <?php echo ymd_TO_dmy($data_search['end_date']); ?></strong></p>
                        </div>
                        <div class="col-md-6 zero-right" align="right">
                            <?php $num = strtotime($data_search['end_date']) - strtotime($data_search['start_date']);
                            echo $num / (60 * 60 * 24) + 1; ?> วัน x ฿<?php echo $car->result->price; ?>

                        </div>
                    </div>
                    <hr>
                    <div class="row font-size-15">
                        <div class="col-md-6">
                            <p><strong>ค่ารับ - ส่งรถ</strong></p>
                        </div>
                        <div class="col-md-6 zero-right" align="right">
                            <p class="text-danger">ฟรี!</p>

                        </div>
                    </div>
                    <hr id="promotion">
                    <div class="row">
                        <div class="col-md-6">
                            <p class=" font-weight-500"> ราคารวม </p>
                        </div>
                        <div class="col-md-6" align="right">
                            <p class=" font-weight-500"> ฿ <?php echo ($num / (60 * 60 * 24) + 1) * $car->result->price; ?> </p>

                        </div>
                    </div>
                    <hr>
                    <div class="bg-orange mb-2" style="padding:10px;">
                        <div class="row no-border pb-0">
                            <div class="col-auto mr-auto"><b style="font-size: 13px;"><i class="fa fa-shield-alt"></i> ค่ามัดจำเพื่อประกันความเสียหาย</b></div>
                            <div class="col-auto" style="text-align: right; padding-right: 10px;"><b>฿5,000</b></div>
                        </div>
                        <div class="row no-border pt-0">
                            <div class="col-auto mr-auto pr-0"><small>ชำระ ณ วันที่รับรถเช่า และได้รับคืนเมื่อสิ้นสุดการเช่า</small></div>
                        </div>
                    </div>

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="withDriver" name="withDriver">
                        <label class="custom-control-label" for="withDriver"> <span><i class="fa fa-user"></i></span> พร้อมคนขับรถ + ฿500</label>
                    </div>

                    <div align="right">
                        <?php
                        Session::init();
                        $user = Session::get("user");
                        ?>
                        <?php if ($user) : ?>
                            <button type="button" class="btn btn-primary book_car">เลือกรถคันนี้</button>
                        <?php else : ?>
                            <button type="button" class="btn btn-primary booking">เลือกรถคันนี้</button>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">ยืนยันการจอง</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" id="rent-car" action="<?php echo URL ?>rent/booking">
                    <div class="form-group">
                        <label for="provine_id">ที่อยู่</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label for="provine_id">เบอร์โทรศัพท์</label>
                        <input type="text" class="form-control" name="phoneNumber">
                    </div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" id="modal-withDriver" name="withDriver">
                <input type="hidden" name="carId" value="<?php echo $car->result->carId; ?>">
                <input type="hidden" name="startDate" value="<?php echo $data_search['start_date']; ?>">
                <input type="hidden" name="endDate" value="<?php echo $data_search['end_date']; ?>">
                <button type="button" class="btn btn-primary book_car">จอง</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function history_Back() {
        window.history.back();
    }


    $(".booking").click(function() {
        $("#myModal").modal("show");
    });

    $(".book_car").click(function() {
        var check = $("#withDriver").prop("checked");
        $("#modal-withDriver").val(check);
        $("#myModal").modal('hide');
        $("#rent-car").submit();
    });

    $(document).ready(function() {
        var num = <?php echo strtotime($data_search['end_date']) - strtotime($data_search['start_date']) ?>;
        var num_day = num / (60 * 60 * 24) + 1;
        var province = "<?php echo $car->result->provinceByAddressProvince->name ?>";
        var startDate = "<?php echo $data_search['start_date']; ?>";
        var endDate = "<?php echo $data_search['end_date']; ?>";
        if (num_day > 3) {
            $.ajax({
                url: "<?php echo URL ?>/other_service/get_festival_by_date",
                method: 'POST',
                data: {
                    "province": province,
                    "startDate": startDate,
                    "endDate": endDate,
                },
                success: function(data) {
                    console.log(data);
                    var n = 2;
                    var vip = 2;
                    if (n > data.result[0].regularAmount) {
                        n = data.result[0].regularAmount;
                    }
                    if (vip > data.result[0].vipAmount) {
                        vip = data.result[0].vipAmount;
                    }
                    var sum = n + vip;
                    $("#rent-car").append(`<input type="hidden" name="idFes" value="` + data.result[0].idFes + `">
                    <input type="hidden" name="countVip" value="` + n + `">
                    <input type="hidden" name="countRegular" value="` + vip + `">`);

                    $("#promotion").after(`<div class="row font-size-15">
                        <div class="col-md-6">
                            <p><strong>บัตรเข้าร่วมงาน</strong></p>
                            <p>` + data.result[0].nameFes + `</p>
                            <p> ณ  ` + data.result[0].location + `</p>
                            <p>จังหวัด ` + data.result[0].province + `</p>
                        </div>
                        <div class="col-md-6 zero-right" align="right">
                            <p class="text-danger">จำนวน ` + sum + ` ใบ ฟรี!</p>
                        </div>
                    </div>
                    <hr>`);
                },
                error: function(data) {
                    console.log("error");
                    console.log(data);
                }
            });
        }
    });
</script>