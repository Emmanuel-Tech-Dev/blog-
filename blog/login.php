<?php
$page_title = "Login to Em's Blog";
include "path.php";

include (ROOT_PATH . "/inlcudes/header.php");
include (ROOT_PATH . "/inlcudes/navbar.php");
include ( ROOT_PATH . "/app/controllers/users.php");

guest_only();
?>

<Style>
  @media  (max-width:890px){
       
     .pst{
      margin-top: 25%;
    }
  }
 @media  (min-width:990px){
       
     .pst{
      margin-top: 10%;
    }
  }

</Style>



<section class=" bg-image ">
  <div class="mask d-flex align-items-center h-60 ">
    <div class="container h-30">
      <div class="pst">
      <div class="row d-flex justify-content-center align-items-center h-100 " style="margin-top: 15%;">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px; margin-top: 15%;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Log into your account</h2>

              <form action="login.php" method="POST">


                <?php if (count($errors) > 0)
              :
              ?>

                <div class=" alert alert-danger">
                  <?php foreach ($errors as $error): ?>
                  <h5>
                    <?php echo $error ?>
                  </h5>
                  <?php endforeach; ?>
                </div>
                <?php endif; ?>


                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3cg">Username</label>

                  <input type="text" id="form3Example3cg" class="form-control form-control-lg" name="username"  value="<?php echo $username;  ?>" />
                </div>

                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example4cg">Password</label>
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" value="<?php echo $password;  ?>" />

                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary  btn-lg text-body" name="login_btn">Log In</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Dont have an account? <a href="./signup.php"
                    class="fw-bold text-body"><u>SignUp here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</section>


<?php
include "../blog/inlcudes/footer.php";
?>