<style>
    .mb-4 {
        margin-top: 1.5rem !important;
        margin-bottom: 1.5rem !important;
    }

    select {
        width: 200px;
    }
</style>

<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <h3>จัดการรถเช่า</h3>
                </div>
                <div class="col-md-10 col-lg-10 text-right">
                    <button type="button" class="btn btn-success btn-create"><span><i class="fa fa-plus"></i> </span> เพิ่มรถ</button>
                </div>
            </div>
            <hr>
            <table id="data" class="table table-striped table-bordered dataTable no-footer" style="width:100%">
                <thead id="head-table">
                </thead>
                <tbody id="body-table">
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $province = json_decode($this->province); ?>
<!-- The Modal -->
<div class="modal fade" id="create-car">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มรถ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" id="add-car" action="<?php echo URL ?>car_manage/create">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="brand">ยี่ห้อ</label>
                                <select id="brand" name="brand" class="form-control" required>
                                    <option value="">เลือกยี่ห้อรถ</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="model">รุ่น</label>
                                <input type="text" class="form-control" id="model" name="model" required>
                            </div>
                            <div class="col-md-4">
                                <label for="typeCar">ประเภทรถ</label>
                                <select id="typeCar" name="typeCar" class="form-control" required>
                                    <option value="">เลือกประเภทรถ</option>
                                    <option value="รถเก๋ง">รถเก๋ง</option>
                                    <option value="รถกระบะ">รถกระบะ</option>
                                    <option value="รถทัวร์">รถทัวร์</option>
                                    <option value="รถตู้">รถตู้</option>
                                    <option value="รถมอเตอร์ไซค์">รถมอเตอร์ไซค์</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="licensePlate">ทะเบียนรถ</label>
                                <input type="text" class="form-control" id="licensePlate" name="licensePlate" required>
                            </div>
                            <div class="col-md-4">
                                <label for="provinceByProvinceId">จังหวัดทะเบียนรถ</label>
                                <select id="provinceByProvinceId" name="provinceByProvinceId" class="form-control" required>
                                    <option value="">เลือกจังหวัด</option>
                                    <?php foreach ($province->result as $key => $value) : ?>
                                        <option value='<?php echo $value->provinceId ?>'> <?php echo $value->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="provinceByAddressProvince">จังหวัดให้บริการ</label>
                                <select id="provinceByAddressProvince" name="provinceByAddressProvince" class="form-control" required>
                                    <option value="">เลือกจังหวัด</option>
                                    <?php foreach ($province->result as $key => $value) : ?>
                                        <option value='<?php echo $value->provinceId ?>'> <?php echo $value->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="seatCount">จำนวนที่นั่ง</label>
                                <input type="number" class="form-control" id="seatCount" name="seatCount" min="2" value="2" required>
                            </div>
                            <div class="col-md-4">
                                <label for="price">ราคา</label>
                                <input type="text" class="form-control" id="price" name="price" required>

                            </div>
                            <div class="col-md-4">
                                <label for="discount">ส่วนลด (เปอร์เซ็นต์)</label>
                                <input type="text" class="form-control" id="discount" name="discount" required>

                            </div>

                        </div>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success create">ยืนยัน</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="edit-car">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">แก้ไขรถ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form method="POST" id="add-car" action="<?php echo URL ?>car_manage/update">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="brand">ยี่ห้อ</label>
                                <select id="edit-brand" name="brand" class="form-control" required>
                                    <option value="">เลือกยี่ห้อรถ</option>
                                    <option value="Honda">Honda</option>
                                    <option value="Toyota">Toyota</option>
                                    <option value="Hyundai">Hyundai</option>
                                    <option value="Mercedes-Benz">Mercedes-Benz</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="model">รุ่น</label>
                                <input type="text" class="form-control" id="edit-model" name="model" required>
                            </div>
                            <div class="col-md-4">
                                <label for="edit-typeCar">ประเภทรถ</label>
                                <select id="edit-typeCar" name="typeCar" class="form-control" required>
                                    <option value="">เลือกประเภทรถ</option>
                                    <option value="รถเก๋ง">รถเก๋ง</option>
                                    <option value="รถกระบะ">รถกระบะ</option>
                                    <option value="รถทัวร์">รถทัวร์</option>
                                    <option value="รถตู้">รถตู้</option>
                                    <option value="รถมอเตอร์ไซค์">รถมอเตอร์ไซค์</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="licensePate">ทะเบียนรถ</label>
                                <input type="text" class="form-control" id="edit-licensePlate" name="licensePlate" required>
                            </div>
                            <div class="col-md-4">
                                <label for="provinceByProvinceId">จังหวัดทะเบียนรถ</label>
                                <select id="edit-provinceByProvinceId" name="provinceByProvinceId" class="form-control" required>
                                    <option value="">เลือกจังหวัด</option>
                                    <?php foreach ($province->result as $key => $value) : ?>
                                        <option value='<?php echo $value->provinceId ?>'> <?php echo $value->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="provinceByAddressProvince">จังหวัดให้บริการ</label>
                                <select id="edit-provinceByAddressProvince" name="provinceByAddressProvince" class="form-control" required>
                                    <option value="">เลือกจังหวัด</option>
                                    <?php foreach ($province->result as $key => $value) : ?>
                                        <option value='<?php echo $value->provinceId ?>'> <?php echo $value->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="seatCount">จำนวนที่นั่ง</label>
                                <input type="number" class="form-control" id="edit-seatCount" name="seatCount" min="2" value="2" required>
                            </div>
                            <div class="col-md-4">
                                <label for="price">ราคา</label>
                                <input type="text" class="form-control" id="edit-price" name="price" required>

                            </div>
                            <div class="col-md-4">
                                <label for="discount">ส่วนลด (เปอร์เซ็นต์)</label>
                                <input type="text" class="form-control" id="edit-discount" name="discount" required>

                            </div>

                        </div>
                    </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" id="edit-carId">
                <input type="hidden" id="edit-numCar">
                <button type="button" id="btn-edit-car" class="btn btn-success">ยืนยัน</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
        </div>
    </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="delete-car">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">ต้องการลบ </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p id="delete-model-car"></p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <input type="hidden" id="delete-carId">
                <button type="button" id="btn-delete" class="btn btn-danger">ยืนยัน</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            url: "<?php echo URL ?>/car_manage/get_car",
            method: "POST",
            success: function(data) {
                $("#head-table").append("<tr><th>ลำดับที่</th><th>ยี่ห้อ</th><th>รุ่น</th><th>ประเภท</th><th>ทะเบียนรถ</th><th>สถานที่</th><th>ราคา</th><th></th></tr>");
                $("#body-table").append("");
                if (data) {
                    data.forEach(function(element, index) {
                        $("#body-table").append("<tr id='carId" + element.carId + "'><td>" + (index + 1) + "</td><td>" + element.brand + "</td><td>" + element.model + "</td><td>" + element.typeCar + "</td><td>" + element.licensePlate + "</td><td>" + element.provinceByProvinceId.name + "</td><td>" + element.price + `</td><td>
                        <center> <button type="button" class="btn btn-warning btn-edit" data-numCar="`+ (index + 1)+`" data-carId="` + element.carId + `" data-brand="` + element.brand + `" data-model="` + element.model + `" data-licensePlate="` + element.licensePlate + `" data-provinceByProvinceId="` + element.provinceByProvinceId.provinceId + `" data-provinceByAddressProvince="` + element.provinceByAddressProvince.provinceId + `" data-seatCount="` + element.seatCount + `" data-price="` + element.price + `" data-discount="` + element.discount + `" data-typeCar="` + element.typeCar + `">แก้ไข</button> <button type="button" class="btn btn-danger btn-delete" data-carId="` + element.carId + `" data-model="` + element.model + `" data-licensePlate="` + element.licensePlate + `" data-provinceByProvince="` + element.provinceByProvinceId.name + `">ลบ</button></center></td></tr>`);
                    });
                }
                console.log(data);

            },
            error: function(data) {
                console.log(data);
            }
        }).done(function() {
            $('#data').DataTable({
                responsive: true,
                ordering: true,
               
            });
        });
    });
</script>
<script>
    $(".btn-create").click(function() {
        $("#create-car").modal("show")
    });
    $("#data").on('click', '.btn-delete', function() {
        var carId = $(this).attr("data-carId");
        var model = $(this).attr("data-model");
        var licensePlate = $(this).attr("data-licensePlate");
        var provinceByProvince = $(this).attr("data-provinceByProvince");
        $("#delete-model-car").empty();
        $("#delete-model-car").append(model + " ป้ายทะเบียน  <span class='text-danger'>" + licensePlate + " " + provinceByProvince + "</span>");
        $("#delete-carId").val(carId);
        $("#delete-car").modal("show");
    });
    $("#btn-delete").click(function() {
        var carId = $("#delete-carId").val();
        $.ajax({
            url: "<?php echo URL ?>/car_manage/delete",
            method: "POST",
            data: {
                "carId": carId,
            },
            success: function(data) {
                console.log(data);
                if (data) {
                    $("#carId" + data.result.carId).remove();
                }

            },
            error: function(data) {
                console.log(data);
            }
        });
        $("#delete-car").modal("hide");
    });
    $("#data").on('click', '.btn-edit', function() {
        var carId = $(this).attr("data-carId");
        var typeCar = $(this).attr("data-typeCar");
        var brand = $(this).attr("data-brand");
        var model = $(this).attr("data-model");
        var licensePlate = $(this).attr("data-licensePlate");
        var provinceByProvinceId = $(this).attr("data-provinceByProvinceId");
        var provinceByAddressProvince = $(this).attr("data-provinceByAddressProvince");
        var seatCount = $(this).attr("data-seatCount");
        var price = $(this).attr("data-price");
        var discount = $(this).attr("data-discount");
        var numCar = $(this).attr("data-numCar");
        $("#edit-carId").val(carId);
        $("#edit-typeCar").val(typeCar);
        $("#edit-brand").val(brand);
        $("#edit-model").val(model);
        $("#edit-licensePlate").val(licensePlate);
        $("#edit-provinceByProvinceId").val(provinceByProvinceId);
        $("#edit-provinceByAddressProvince").val(provinceByAddressProvince);
        $("#edit-seatCount").val(seatCount);
        $("#edit-price").val(price);
        $("#edit-discount").val(discount);
        $("#edit-numCar").val(numCar);
        $("#edit-car").modal("show");
    });

    $("#btn-edit-car").click(function() {

        var carId = $("#edit-carId").val();
        var typeCar = $("#edit-typeCar").val();
        var brand = $("#edit-brand").val();
        var model = $("#edit-model").val();
        var licensePlate = $("#edit-licensePlate").val();
        var provinceByProvinceId = $("#edit-provinceByProvinceId").val();
        var provinceByAddressProvince = $("#edit-provinceByAddressProvince").val();
        var seatCount = $("#edit-seatCount").val();
        var price = $("#edit-price").val();
        var discount = $("#edit-discount").val();
        var numCar = $("#edit-numCar").val();
        $.ajax({
            url: "<?php echo URL ?>/car_manage/edit",
            method: "POST",
            data: {
                "carId": carId,
                "typeCar": typeCar,
                "brand": brand,
                "model": model,
                "licensePlate": licensePlate,
                "provinceByProvinceId": provinceByProvinceId,
                "provinceByAddressProvince": provinceByAddressProvince,
                "seatCount": seatCount,
                "price": price,
                "discount": discount,
            },
            success: function(data) {
                console.log(data);
                if (data) {
                        $("#carId" + data.result.carId).empty();
                        $("#carId" + data.result.carId).append("<td>" + numCar + "</td><td>" + data.result.model + "</td><td>" + data.result.licensePlate + "</td><td>" + data.result.provinceByProvinceId.name + "</td><td>" + data.result.price + `</td><td>
                        <center> <button type="button" class="btn btn-warning btn-edit" data-numCar="`+ numCar+`" data-carId="` + data.result.carId + `" data-brand="` + data.result.brand + `" data-model="` + data.result.model + `" data-licensePlate="` + data.result.licensePlate + `" data-provinceByProvinceId="` + data.result.provinceByProvinceId.provinceId + `" data-provinceByAddressProvince="` + data.result.provinceByAddressProvince.provinceId + `" data-seatCount="` + data.result.seatCount + `" data-price="` + data.result.price + `" data-discount="` + data.result.discount + `" data-typeCar="` + data.result.typeCar + `">แก้ไข</button> <button type="button" class="btn btn-danger" data-carId="` + data.result.carId + `">ลบ</button></center></td>`);
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
        $("#edit-car").modal("hide");
    });
</script>