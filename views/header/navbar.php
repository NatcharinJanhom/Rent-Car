<!-- Navigation -->
<?php Session::init();?>
<nav class="navbar navbar-expand-lg navbar-dark bg-blue">
<a class="navbar-brand" href="#"><span><i class="fa fa-car"></i></span> DriveCar</a>
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>home">หน้าแรก</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>promotion">โปรโมชั่น</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>manage_booking">จัดการการจอง</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>car_type">ประเภทรถ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>contact">ติดต่อเรา</a>
                </li>
                <?php
if (Session::get('user') != null) {

    ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>auth/logout">ออกจากระบบ</a>
                </li>
                <?php } else {?>
                 <li class="nav-item">
                    <a class="nav-link" href="<?php echo URL; ?>auth/login">เข้าสู่ระบบ</a>
                </li>
                <?php }?>
            </ul>
        </div>
    </div>
</nav>
