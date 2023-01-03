<?php
$page_title =  "Topic page";
include "../../path.php";
include ROOT_PATH . "/inlcudes/admin_head.php";
include ROOT_PATH . "/app/controllers/topics.php";
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
              <a href="../users/index.php">
                <i class="fa fa-user pe-7s-display2"></i>
                Manage Admin Users
              </a>
            </li>
            <li class="app-sidebar__heading">Blog Topics</li>
            <li>
              <a href="index.php"  class="mm-active">
                <i class="fa fa-table pe-7s-mouse">
                </i> Manage Topics
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>
    <div class="app-main__outer  h-100">
      <div class="app-main__inner p-5">
        <div class="app-page-title">
          <div class="page-title-wrapper">
            <div class="page-title-heading">
              <div>Manage Blog Topics
                <div class="page-title-subheading">This is an example dashboard created using build-in elements and
                  components.
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="btn-group" style="padding-bottom: 20px;">
                  <div class="add-btn">
                    <a href="create.php" class="btn btn-big">Add New Topic</a>
                  </div>
                  <div class="manage-btn">
                    <a href="index.php" class="btn btn-big x">Manage Topics</a>
                  </div>
                </div>
        <div class="table-responsive">
          <table class="align-middle mb-0 table table-borderless table-striped table-hover" >
            <?php if (isset($_SESSION['status'])): ?>
            <div class="pst">
              <div class="alert <?php echo $_SESSION['type']; ?> ">
                <h5>
                  <?php echo $_SESSION['status']; ?>
                </h5>
              </div>
              <?php unset($_SESSION['status']
                      );
                      unset($_SESSION['type']
                      ); ?>
            </div>
            <?php endif; ?>

            <thead>
              <tr  style = "font-size:16px; ">
                <th class="text-center">SN</th>
                <th class="">Topic Name</th>
                <th class="">Description</th>
                <th colspan="2" class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody style = "font-size:14px; ">
              <?php foreach ($topics as $key => $topic): ?>
              <tr>
                <td class="text-center text-muted"><?php echo $key + 1; ?></td>
                <td>
                  <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left flex2">
                        <div class="widget-heading"><?php echo $topic['name']; ?></div>
                        <div class="widget-subheading opacity-7" style="font-size: 14px;"><?php echo date('F j, Y', strtotime($topic['created_at'])); ?></div>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                     
                      <div class="widget-content-left flex2">
                        <div class="widget-heading text-sm" style = "font-size:16px; font-weight: 400; "><?php echo substr($topic['description'] , 0 , 40) . '....'; ?></div>
                      </div>
                    </div>
                  </div>
                </td>
               
                <td class="mr-0">
                <td> <button type="button" class="btn btn-success btn-md"><a
                      href="edit.php?id=<?php echo $topic['id'];?>" class="edit">edit</a></button>
                </td>
                <td> <button type="button" class="btn btn-danger btn-md"><a
                      href="index.php?del_id=<?php echo $topic['id']; ?>" class="delete">delete</a></button>
                </td>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>


      </div>



<?php include ROOT_PATH . "/inlcudes/admin_footer.php" ?>
































