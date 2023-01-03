<?php
 $page_title = "SignUp page";
include "path.php";
include (ROOT_PATH . "/inlcudes/header.php");
include (ROOT_PATH . "/inlcudes/navbar.php");
include (ROOT_PATH . "/app/controllers/users.php");
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





<section class="vh-50 bg-image">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-30">
            <div class="pst">
            <div class="row d-flex justify-content-center align-items-center h-100" style="margin:17% auto;">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">

                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form action="signup.php" method="POST">

                           <?php if (count($errors) > 0)
                               :
                                  ?>

<div class=" alert alert-danger">
    <?php foreach ($errors as $error): ?>
    <h5> <?php echo $error ?></h5>
    <?php endforeach; ?>
</div>
                                  <?php endif; ?>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example1cg">Your Name</label>

                                    <input type="text" name="username" id="form3Example1cg" value="<?php echo $username; ?>"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3cg">Your Email</label>

                                    <input type="email" name="email" id="form3Example3cg" value="<?php echo $email; ?>"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cg">Password</label>

                                    <input type="password" name="password" id="form3Example4cg" value="<?php echo $password; ?>"
                                        class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                                    <input type="password" name="cpassword" id="form3Example4cdg" 
                                        class="form-control form-control-lg" />

                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" name="signup_btn"
                                        class="btn btn-primary btn-lg  text-body">Register</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                                        class="fw-bold text-body"><u>Login here</u></a></p>

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