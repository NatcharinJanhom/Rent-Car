<style>
  .form-control {
    height: 44px;
    border: 1px solid #ccc;
  }

  .auth.register-bg-1 {
    background: url(pic/bg.jpg);
    background-size: cover;
  }
</style>
<div class="container-scroller">
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth register-bg-1 theme-one">
      <div class="row w-100 mt-5">
        <div class="col-lg-6 mx-auto">
          <h2 class="text-center mb-4">Register</h2>
          <div class="auto-form-wrapper">

            <form action='<?php echo URL ?>register/register_insert' method="post" id="form_register">
              <div class="form-group row">

                <label for="name" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                  <input id="name" name="name" type="text" class="form-control" placeholder="Enter your name">
                </div>


              </div>
              <div class="form-group row">
                <label for="surname" class="col-sm-3 col-form-label">Surname</label>
                <div class="col-sm-9">
                  <input id="surname" name="surname" type="text" class="form-control" placeholder="Enter your surname">
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                  <textarea name="address" id="address" class="form-control" cols="30" rows="5"></textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Phone number</label>
                <div class="col-sm-9">
                  <input type="text" name="phoneNumber" id="phonenumber" class="form-control">
                </div>
              </div>
              <div class="form-group row">
                <label for="username" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                  <input id="username" name="username" type="username" class="form-control" placeholder="Enter Username"
                    autocomplete="off">
                </div>
              </div>
              <div class="form-group row">
                <label for="password" class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                    <input id="password" name="password" type="password" class="form-control"
                      placeholder="Enter Password" autocomplete="off">
                </div>

              </div>
              <div class="form-group row">
                <label for="cf_password" class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                    <input id="cf_password" name="cf_password" type="password" class="form-control"
                      placeholder="Confirm Password" autocomplete="off">
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary submit-btn btn-block" id="btn_register">Register</button>
              </div>
              <div class="text-block text-center my-3">
                <span class="text-small font-weight-semibold">Already have and account ?</span>
                <a href="index.php" class="text-black text-small">Login</a>
              </div>
            </form>


          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>

  $(document).ready(function () {
    $("#form_register").submit(function (e) {
      e.preventDefault();
      var actionurl = e.currentTarget.action;
      $.ajax({
        url: actionurl,
        type: 'post',
        data: $("#form_register").serialize(),
        success: function (res) {
          if(res.status === "201"){

            swal({
              title: 'Success',
              text: "Registered sucess",
              icon: "success",
            });
            $('input').val('');
          }
          else{
            alert('Error');
          }
        }
      });
    });
  });
</script>