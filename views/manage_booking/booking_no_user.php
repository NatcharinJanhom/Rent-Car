<style>
    .form-control {
        max-width: 300px;

    }
</style>
<div class="container">
    <div class="card m-4">
        <div class="card-body">
            <center>
                <form method="post" action="<?php echo URL ?>manage_booking/search">
                <div class="form-group">
                    <label for="exampleInputName1">รหัสการเช่า</label>
                    <input type="text" name="rent_search" class="form-control">
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 " style="text-align:center;">
                        <button type="submit" class="btn btn-primary" style="padding:5px 40px;"> ค้นหา</button>
                    </div>
                </div>
                </form>
            </center>
        </div>
    </div>
</div>