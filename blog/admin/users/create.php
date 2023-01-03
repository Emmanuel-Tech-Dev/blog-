<?php
$page_title =  "Create Users Page";
include "../../path.php";
include ROOT_PATH . "/inlcudes/admin_head.php";
include ROOT_PATH . "/app/controllers/users.php";
 admin_only();

// 
?>


<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

<?php include ROOT_PATH . "/inlcudes/admin_nav.php"?>

  <div class="app-main">
    <div class="app-sidebar sidebar-shadow">
      <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
          <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="app-header__mobile-menu">
        <div>
          <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
      <div class="app-header__menu">
        <span>
          <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
              <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
          </button>
        </span>
      </div>
      <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
          <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboard</li>
            <li>
              <a href="../dashboard-2.php">
                <i class="fa fa-home pe-7s-rocket"></i>
                Home
              </a>
            </li>
            <li class="app-sidebar__heading">Blog Posts</li>
            <li>
              <a href="../post/index.php">
                <i class="fa fa-list pe-7s-diamond"></i>
                Manage Posts

              </a>

            </li>

            <li class="app-sidebar__heading">Admin Users</li>
            <li>
              <a href="index.php"  class="mm-active">
                <i class="fa fa-user pe-7s-display2"></i>
                Manage Admin Users
              </a>
            </li>
            <li class="app-sidebar__heading">Blog Topics</li>
            <li>
              <a href="../topic/index.php">
                <i class="fa fa-table pe-7s-mouse">
                </i> Manage Topics
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>

    <div class="app-main__outer">
      <div class="app-main__inner p-5">
        <div class="app-page-title">
          <div class="page-title-wrapper">
            <div class="page-title-heading">
              <div>Create New User
                <div class="page-title-subheading">This is an example dashboard created using build-in elements and
                  components.
                </div>
              </div>
            </div>

          </div>
        </div>


        <div class="content">
          <form action="create.php" method="POST">

            <?php if (count($errors) > 0):?>
            <div class=" alert alert-danger">
              <?php foreach ($errors as $error): ?>
              <h5>
                <?php echo $error ?>
              </h5>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>

            <div>
                  <label>Username</label><br>
                  <input type="text" name="username" class="text-input-u">

               </div>
               <div>
                  <label>Email</label><br>
                  <input type="text" name="email" class="text-input-u">

               </div>
               <div>
                  <label>Password</label><br>
                  <input type="password" name="password" class="text-input-u">

               </div>
               <div>
                  <label>Confirm Password</label><br>
                  <input type="password" name="cpassword" class="text-input-u">

               </div>

               <div>
                  <?php if (isset($admin) && $admin == 1): ?>
                  <div class="input-group mt-4 pb-0 ">
                     <div class="input-group-text pb-0">
                        <label class="check">
                           <input class="form-check-input " type="checkbox" name="admin" checked>
                           Admin</label>
                     </div>
                  </div>
                  <?php else: ?>
                  <div class="input-group mt-4 pb-0 ">
                     <div class="input-group-text pb-0">
                        <label class="check">
                           <input class="form-check-input " type="checkbox" name="admin">
                           Admin</label>
                     </div>
                  </div>
                  <?php endif; ?>

               </div>


               <div>
                  <button type="submit" name="add_admin">Add User</button>
               </div>

            </form>

        </div>


      </div>


      <?php include ROOT_PATH . "/inlcudes/admin_footer.php" ?>


























