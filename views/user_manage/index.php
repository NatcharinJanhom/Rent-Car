<style>
    .mb-4 {
        margin-top: 1.5rem !important;
        margin-bottom: 1.5rem !important;
    }

    .text-wrap {
        white-space: normal;
    }

    .width-200 {
        width: 400px;
    }
</style>
<?php $customer = json_decode($this->customer)?>
<?php $admin = json_decode($this->admin)?>
<?php $company = json_decode($this->company);?>
<div class="container">
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <h3>จัดการผู้ใช้</h3>
                </div>
                <div class="col-md-10 col-lg-10 text-right">
                    <button type="button" class="btn btn-success btn-create"><span><i class="fa fa-plus"></i> </span> เพิ่มผู้ใช้</button>
                </div>
            </div>
            <hr>
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#show-customer">CUSTOMER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#show-admin">ADMIN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#show-company">COMPANY</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="show-customer" class="container tab-pane active"><br>
                    <?php if (sizeof($customer->result) <= 0): ?>
                        <p>ไม่พบผู้ใช้ประเภทนี้ในระบบ</p>
                    <?php else: ?>
                        <table id="customer-all" class="table table-striped table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <th>ลำดับ</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>ที่อยู่</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>token</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php foreach ($customer->result as $key => $value): ?>
                                    <tr>
                                        <td><?php echo ($key + 1) ?></td>
                                        <td><?php echo $value->fname ?></td>
                                        <td><?php echo $value->lname ?></td>
                                        <td><?php echo $value->address ?></td>
                                        <td><?php echo $value->phoneNumber ?></td>
                                        <td>
                                            <div class="text-wrap width-200">
                                                <?php echo $value->rememberToken ?>
                                            </div>
                                        </td>
                                        <td>
                                            <center><button type="button" class="btn btn-danger btn-delete-user" userId="<?php echo $value->userId ?>">ลบ</button></center>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    <?php endif;?>
                </div>
                <div id="show-admin" class="container tab-pane"><br>
                    <?php if (sizeof($admin->result) <= 0): ?>
                        <p>ไม่พบผู้ใช้ประเภทนี้ในระบบ</p>
                    <?php else: ?>
                        <table id="admin-all" class="table table-striped table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <th>ลำดับ</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>ที่อยู่</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>token</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php foreach ($admin->result as $key => $value): ?>
                                    <tr>
                                        <td><?php echo ($key + 1) ?></td>
                                        <td><?php echo $value->fname ?></td>
                                        <td><?php echo $value->lname ?></td>
                                        <td><?php echo $value->address ?></td>
                                        <td><?php echo $value->phoneNumber ?></td>
                                        <td>
                                            <div class="text-wrap width-200">
                                                <?php echo $value->rememberToken ?>
                                            </div>
                                        </td>
                                        <td>
                                            <center><button type="button" class="btn btn-danger btn-delete-user" userId="<?php echo $value->userId ?>">ลบ</button></center>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    <?php endif;?>
                </div>
                <div id="show-company" class="container tab-pane"><br>
                    <?php if (sizeof($company->result) <= 0): ?>
                        <p>ไม่พบผู้ใช้ประเภทนี้ในระบบ</p>
                    <?php else: ?>
                        <table id="company-all" class="table table-striped table-bordered table-hover dt-responsive nowrap" style="width:100%">
                            <thead>
                                <th>ลำดับ</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>ที่อยู่</th>
                                <th>เบอร์โทรศัพท์</th>
                                <th>token</th>
                                <th></th>
                            </thead>
                            <tbody>
                                <?php foreach ($company->result as $key => $value): ?>
                                    <tr>
                                        <td><?php echo ($key + 1) ?></td>
                                        <td><?php echo $value->fname ?></td>
                                        <td><?php echo $value->lname ?></td>
                                        <td><?php echo $value->address ?></td>
                                        <td><?php echo $value->phoneNumber ?></td>
                                        <td>
                                            <div class="text-wrap width-200">
                                                <?php echo $value->rememberToken ?>
                                            </div>
                                        </td>
                                        <td>
                                            <center><button type="button" class="btn btn-danger btn-delete-user" userId="<?php echo $value->userId ?>">ลบ</button></center>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="create-user">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มผู้ใช้</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <form action='<?php echo URL ?>user_manage/create' method="post" id="create-user-company">

                    <div class="form-group row">
                        <label for="add-username-company" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input id="add-username-company" name="username" type="username" class="form-control" placeholder="ชื่อผู้ใช้" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="add-password-company" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input id="add-password-company" name="password" type="password" class="form-control" placeholder="รหัสผ่าน" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-key"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="add-cf_password-company" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-9" id="alert-messenge-company">
                            <div class="input-group">
                                <input id="add-cf_password-company" name="cf_password" type="password" class="form-control" placeholder="ยืนยันรหัสผ่าน" required>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-key"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label for="add-name-company" class="col-sm-3 col-form-label">ชื่อ</label>
                        <div class="col-sm-9">
                            <input id="add-name-company" name="name" type="text" class="form-control" placeholder="ชื่อ" required>
                        </div>


                    </div>
                    <div class="form-group row">
                        <label for="add-surname-company" class="col-sm-3 col-form-label">นามสกุล</label>
                        <div class="col-sm-9">
                            <input id="add-surname-company" name="surname" type="text" class="form-control" placeholder="นามสกุล" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="add-address-company" class="col-sm-3 col-form-label">ที่อยู่</label>
                        <div class="col-sm-9">
                            <input id="add-address-company" name="address" type="text" class="form-control" placeholder="ที่อยู่" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="add-phoneNumber-company" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                        <div class="col-sm-9">
                            <input id="add-phoneNumber-company" name="phoneNumber" type="text" class="form-control" placeholder="เบอร์โทรศัพท์" required>
                        </div>

                    </div>
                    <div class="form-group row">
                        <label for="add-typeUser-company" class="col-sm-3 col-form-label">ประเภทผู้ใช้</label>
                        <div class="col-sm-9">
                            <select id="add-typeUser-company" name="typeUser" class="form-control" required>
                                <option value="ADMIN">ADMIN</option>
                                <option value="COMPANY">COMPANY</option>
                            </select>
                        </div>
                    </div>


            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success create-company">ยืนยัน</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">ยกเลิก</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(".btn-create").click(function() {
        $("#create-user").modal("show")
    });

    $(".btn-delete-user").click(function(){
            swal({
                    title: "คุณแน่ใจว่าต้องการลบ ?",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "<?php echo URL ?>/user_manage/delete",
                            method: "POST",
                            data: {
                                "userId": $(this).attr('userId'),
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

    $(" .create-company").click(function() {
        var username = $("#add-username-company").val();

        var password = $("#add-password-company").val();
        var cf_password = $("#add-cf_password-company").val();
        var name = $("#add-name-company").val();
        var surname = $("#add-surname-company").val();
        var address = $("#add-address-company").val();
        var phoneNumber = $("#add-phoneNumber-company").val();
        var check = false;
        if (password != cf_password) {
            $(".alert-pwd").remove();
            $("#alert-messenge-company").append("<span class='text-danger alert-pwd'> รหัสผ่านไม่ตรงกัน </span>");
            check = false;
        } else if (password == cf_password) {
            $(".alert-pwd").remove();
            check = true;
        }
        if (check) {
            $("#create-user-company").submit();
            $("#create-user").modal("hide")
        }

    });

    $('#customer-all').DataTable({
        responsive: true,
        "ordering": true,
        "columnDefs": [{
                "width": "5%",
                "targets": 0
            },
            {
                "width": "15%",
                "targets": 1
            },
            {
                "width": "15%",
                "targets": 2
            },
            {
                "width": "15%",
                "targets": 3
            },
            {
                "width": "15%",
                "targets": 4
            },
            {
                "width": "15%",
                "targets": 5
            },
            {
                "width": "20%",
                "targets": 6
            }
        ],
    });

    $('#admin-all').DataTable({
        responsive: true,
        "ordering": true,
        "columnDefs": [{
                "width": "5%",
                "targets": 0
            },
            {
                "width": "15%",
                "targets": 1
            },
            {
                "width": "15%",
                "targets": 2
            },
            {
                "width": "15%",
                "targets": 3
            },
            {
                "width": "15%",
                "targets": 4
            },
            {
                "width": "15%",
                "targets": 5
            },
            {
                "width": "20%",
                "targets": 6
            }
        ],
    });
    $('#company-all').DataTable({
        responsive: true,
        "ordering": true,
        "columnDefs": [{
                "width": "5%",
                "targets": 0
            },
            {
                "width": "15%",
                "targets": 1
            },
            {
                "width": "15%",
                "targets": 2
            },
            {
                "width": "15%",
                "targets": 3
            },
            {
                "width": "15%",
                "targets": 4
            },
            {
                "width": "15%",
                "targets": 5
            },
            {
                "width": "20%",
                "targets": 6
            }
        ],
    });
</script>