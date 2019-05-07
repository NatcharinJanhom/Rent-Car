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
    width: 300px;
    height: 200px;
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
          <form id="search_car" class="forms-sample" action="<?php echo URL ?>rent/search_car">
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
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
        </ol>
        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active" style="background-image: url('<?php echo URL ?>image/honda-civic-2019MY-A01.jpg')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?php echo URL ?>image/Hyundai.jpg')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?php echo URL ?>image/2018-Toyota-Camry-Banner-Image-.png')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?php echo URL ?>image/benz.png')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?php echo URL ?>image/super-white-revo.png')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?php echo URL ?>image/Hyundai_H1.jpg')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>

          <div class="carousel-item" style="background-image: url('<?php echo URL ?>image/original-1416034605429.jpg')">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>


          <div class="carousel-item" style="background-image: url('<?php echo URL ?>image/Honda_PCX150_L_1.jpg')">
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

  <h1 class="my-4">Booking <span id="book_date" class="h4"></span></h1>
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#chiang_mai">เชียงใหม่</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#bangkok">กรุงเทพ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#phuket">ภูเก็ต</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#khonkean">ขอนแก่น</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <?php $chiang_mai = json_decode($this->chiang_mai);
  $bangkok = json_decode($this->bangkok);
  $phuket = json_decode($this->phuket);
  $khonkean = json_decode($this->khonkean); ?>
  <div class="tab-content">
    <div id="chiang_mai" class="container tab-pane active">
      <?php if ($chiang_mai->status == "200") : ?>

        <div class="row mt-4">
          <?php foreach ($chiang_mai->result as $key => $value) : ?>
            <div class="col-lg-4 mb-4">
              <div class="card">

                <div class="card-body">
                  <?php if ($value->typeCar == "รถเก๋ง" && $value->brand == "Honda") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_civic.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Toyota") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/2018-Toyota-Camry-Banner-Image-.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Mercedes-Benz") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/benz.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Hyundai") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai.jpg" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถกระบะ") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/super-white-revo.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถตู้" && $value->brand == "Toyota") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถตู้" && $value->brand == "Hyundai") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai_H1.jpg" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถจักรยานยนต์") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถทัวร์") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/original-1416034605429.jpg" alt="">
                    </a>
                  <?php endif; ?>
                </div>
                <div class="card-footer text-right">
                  <form class="forms-sample" action="<?php echo URL ?>rent/search_car">
                    <input type="hidden" name="provine_id" value="38">
                    <input type="hidden" class="date_st" name="start_date" value="">
                    <input type="hidden" class="date_end" name="end_date" value="">
                    <button type="submit" class="btn btn-primary">รายละเอียดเพิ่มเติม</button>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>

    <div id="bangkok" class="container tab-pane fade">
      <?php if ($bangkok->status == "200") : ?>

        <div class="row mt-4">
          <?php foreach ($bangkok->result as $key => $value) : ?>
            <?php if ($key <= 2) : ?>
              <div class="col-lg-4 mb-4">
                <div class="card">

                  <div class="card-body">
                    <?php if ($value->typeCar == "รถเก๋ง" && $value->brand == "Honda") : ?>
                      <a href="#">
                        <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_civic.png" alt="">
                      </a>
                    <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Toyota") : ?>
                      <a href="#">
                        <img class="img-fluid-car" src="<?php echo URL ?>image/2018-Toyota-Camry-Banner-Image-.png" alt="">
                      </a>
                    <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Mercedes-Benz") : ?>
                      <a href="#">
                        <img class="img-fluid-car" src="<?php echo URL ?>image/benz.png" alt="">
                      </a>
                    <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Hyundai") : ?>
                      <a href="#">
                        <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai.jpg" alt="">
                      </a>
                    <?php elseif ($value->typeCar == "รถกระบะ") : ?>
                      <a href="#">
                        <img class="img-fluid-car" src="<?php echo URL ?>image/super-white-revo.png" alt="">
                      </a>
                    <?php elseif ($value->typeCar == "รถตู้" && $value->brand == "Toyota") : ?>
                      <a href="#">
                        <img class="img-fluid-car" src="<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png" alt="">
                      </a>
                    <?php elseif ($value->typeCar == "รถตู้" && $value->brand == "Hyundai") : ?>
                      <a href="#">
                        <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai_H1.jpg" alt="">
                      </a>
                    <?php elseif ($value->typeCar == "รถจักรยานยนต์") : ?>
                      <a href="#">
                        <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                      </a>
                    <?php elseif ($value->typeCar == "รถทัวร์") : ?>
                      <a href="#">
                        <img class="img-fluid-car" src="<?php echo URL ?>image/original-1416034605429.jpg" alt="">
                      </a>
                    <?php endif; ?>
                  </div>
                  <div class="card-footer text-right">
                    <form class="forms-sample" action="<?php echo URL ?>rent/search_car">
                      <input type="hidden" name="provine_id" value="1">
                      <input type="hidden" class="date_st" name="start_date" value="">
                      <input type="hidden" class="date_end" name="end_date" value="">
                      <button type="submit" class="btn btn-primary">รายละเอียดเพิ่มเติม</button>
                    </form>
                  </div>
                </div>
              </div>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
    <div id="phuket" class="container tab-pane fade"><br>
      <?php if ($phuket->status == "200") : ?>

        <div class="row mt-4">
          <?php foreach ($phuket->result as $key => $value) : ?>
            <div class="col-lg-4 mb-4">
              <div class="card">

                <div class="card-body">
                  <?php if ($value->typeCar == "รถเก๋ง" && $value->brand == "Honda") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_civic.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Toyota") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/2018-Toyota-Camry-Banner-Image-.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Mercedes-Benz") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/benz.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Hyundai") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai.jpg" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถกระบะ") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/super-white-revo.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถตู้" && $value->brand == "Toyota") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถตู้" && $value->brand == "Hyundai") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai_H1.jpg" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถจักรยานยนต์") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถทัวร์") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/original-1416034605429.jpg" alt="">
                    </a>
                  <?php endif; ?>
                </div>
                <div class="card-footer text-right">
                  <form class="forms-sample" action="<?php echo URL ?>rent/search_car">
                    <input type="hidden" name="provine_id" value="66">
                    <input type="hidden" class="date_st" name="start_date" value="">
                    <input type="hidden" class="date_end" name="end_date" value="">
                    <button type="submit" class="btn btn-primary">รายละเอียดเพิ่มเติม</button>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>

    <!-- Marketing Icons Section -->
    <div id="khonkean" class="container tab-pane fade"><br>
      <?php if ($khonkean->status == "200") : ?>

        <div class="row mt-4">
          <?php foreach ($khonkean->result as $key => $value) : ?>
            <div class="col-lg-4 mb-4">
              <div class="card">

                <div class="card-body">
                  <?php if ($value->typeCar == "รถเก๋ง" && $value->brand == "Honda") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_civic.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Toyota") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/2018-Toyota-Camry-Banner-Image-.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Mercedes-Benz") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/benz.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถเก๋ง" && $value->brand == "Hyundai") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai.jpg" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถกระบะ") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/super-white-revo.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถตู้" && $value->brand == "Toyota") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/6de3961eba9b20e906e321eaa3154276.png" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถตู้" && $value->brand == "Hyundai") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Hyundai_H1.jpg" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถจักรยานยนต์") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/Honda_PCX150_L_1.jpg" alt="">
                    </a>
                  <?php elseif ($value->typeCar == "รถทัวร์") : ?>
                    <a href="#">
                      <img class="img-fluid-car" src="<?php echo URL ?>image/original-1416034605429.jpg" alt="">
                    </a>
                  <?php endif; ?>
                </div>
                <div class="card-footer text-right">
                  <form class="forms-sample" action="<?php echo URL ?>rent/search_car">
                    <input type="hidden" name="provine_id" value="28">
                    <input type="hidden" class="date_st" name="start_date" value="">
                    <input type="hidden" class="date_end" name="end_date" value="">
                    <button type="submit" class="btn btn-primary">รายละเอียดเพิ่มเติม</button>
                  </form>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
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
      var st = moment(today).format("YYYY-MM-DD");
      var end = moment(tomorrow).format("YYYY-MM-DD")
      $(".date_st").val(st);
      $(".date_end").val(end);
      $("#book_date").html(`${moment(st).format('LL')} - ${moment(end).format('LL')}`);
      $('#pick-up').datepicker('setDate', today);
      $('#return').datepicker('setDate', tomorrow);
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
  </script>