<style>
  .pad-left-5 {
    padding-left: 5px;
  }

  .pad-10 {
    padding: 10px;
  }

  .carousel {
    max-height: 500px;
    position: relative;
  }

  .carousel-item {
    max-height: 500px;
    height: 60vh;
  }

  .mr-bot-10 {
    margin-bottom: 10px;
  }

  .margin-auto-0 {
    margin-right: 0;
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
  <?php $province = json_decode($province); ?>
  <div class="row pad-10 ml-2 mr-2">
    <div class="col-lg-5 mr-bot-10">
      <div class="card ">
        <div class="card-body">
          <h4 class="card-title">เช็คราคาและรถว่าง</h4>
          <form id="search_car" class="forms-sample" action="<?php echo URL ?>manage_booking/search_car">
            <div class="form-group">
              <label for="provine_id">จังหวัด</label>
              <select class="form-control" id="provine_id" name="provine_id">
                <option value=""> เลือกจังหวัด </option>
                <?php if ($province->status == "200") :
                  foreach ($province->result as $key => $value) {
                    echo "<option value='$value->provinceId'> $value->name </option>";
                  }
                  ?>

                <?php endif; ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword4"> วันที่รับรถ </label>
              <div id="pick-up" class="input-group date datepicker datepicker-popup">
                <input type="text" class="form-control" id="start_date" name="start_date">
                <span class="input-group-addon input-group-append border-left">
                  <span class="fa fa-calendar-alt input-group-text"></span>
                </span>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleInputCity1"> วันที่คืนรถ </label>
              <div id="return" class="input-group date datepicker datepicker-popup">
                <input type="text" class="form-control" id="end_date" name="end_date">
                <span class="input-group-addon input-group-append border-left">
                  <span class="fa fa-calendar-alt input-group-text"></span>
                </span>
              </div>
            </div>

            <center><button type="button" class="btn btn-success btn_search_car"> ค้นหารถเช่า <i class="pad-left-5 fa fa-check"></i></button></center>
          </form>
        </div>
      </div>
    </div>
    <div class="col-lg-7">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('<?php echo URL ?>image/original-1416034605429.jpg')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo URL ?>image/2016_09_29_Nissan_Micra_1.jpg')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('<?php echo URL ?>image/super-white-revo.png')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </div>
</header>
<div class="container">

  <h1 class="my-4">Booking</h1>
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#chiang_mai">เชียงใหม่</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">กรุงเทพ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">ภูเก็ต</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">ขอนแก่น</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">ภูเก็ต</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
        จังหวัดอื่นๆ
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">นนทบุรี</a>
        <a class="dropdown-item" href="#">เชียงราย</a>
        <a class="dropdown-item" href="#">กระบี่</a>
      </div>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="chiang_mai" class="container tab-pane active"><br>
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">

            <div class="card-body">
              <a href="#">
                <img class="img-fluid-car" src="<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png" alt="">
              </a>
            </div>
            <div class="card-footer margin-auto-0">
              <a href="#" class="btn btn-primary ">รายละเอียดเพิ่มเติม</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">

            <div class="card-body">
              <a href="#">
                <img class="img-fluid-car" src="<?php echo URL ?>image/2016_09_29_Nissan_Micra_1.jpg" alt="">
              </a>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">

            <div class="card-body">
              <a href="#"> <img class="img-fluid-car" src="<?php echo URL ?>image/super-white-revo.png" alt=""> </a>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">

            <div class="card-body">
              <a href="#"> <img class="img-fluid" src="http://placehold.it/400x300" alt=""> </a>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">

            <div class="card-body">
              <a href="#">
                <img class="img-fluid" src="http://placehold.it/400x300" alt="">
              </a>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <a href="#"> <img class="img-fluid" src="http://placehold.it/400x300" alt=""> </a>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <!-- Marketing Icons Section -->
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="card h-100">

            <div class="card-body">
              <a href="#"> <img class="img-fluid" src="http://placehold.it/400x300" alt=""> </a>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">

            <div class="card-body">
              <a href="#"> <img class="img-fluid" src="http://placehold.it/400x300" alt=""> </a>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="card h-100">
            <div class="card-body">
              <a href="#"> <img class="img-fluid" src="http://placehold.it/400x300" alt=""> </a>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">รายละเอียดเพิ่มเติม</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
  </div>
  <!-- Marketing Icons Section -->






</div>
<!-- /.container -->
<script>
  (function($) {

    'use strict';
    $('.datepicker-popup').datepicker({
      enableOnReadonly: true,
      todayHighlight: true,
      format: "dd/mm/yyyy"
    });
    var today = new Date();
    var tomorrow = new Date();
    tomorrow.setDate(today.getDate() + 1);
    $('#pick-up').datepicker('setDate', today);
    $('#return').datepicker('setDate', tomorrow);
  })(jQuery);
</script>

<script>
  $(".btn_search_car").click(function() {
    var start_date = $("#start_date").val();
    var end_date = $("#end_date").val();
    var province = $("#provine_id").val();
    if(province)
    {
      $("#search_car").submit();
    }
    else
    {
      alert("กรุณาเลือกจังหวัด");
    }
    

  });
</script>