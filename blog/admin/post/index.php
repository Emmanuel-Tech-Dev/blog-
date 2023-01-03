<?php
$page_title =  "Post Page";
include "../../path.php";
include ROOT_PATH . "/inlcudes/admin_head.php";
include ROOT_PATH . "/app/controllers/posts.php";
$post = getpublish();
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
              <a href="../admin/post/index.php" class="mm-active">
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
              <a href="../topic/index.php">
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
              <div>Manage Blog Post
                <div class="page-title-subheading">This is an example dashboard created using build-in elements and
                  components.
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="btn-group" style="padding-bottom: 20px;">
                  <div class="add-btn">
                    <a href="create.php" class="btn btn-big">Add Post</a>
                  </div>
                  <div class="manage-btn">
                    <a href="index.php" class="btn btn-big x">Manage Post</a>
                  </div>
                </div>
        <div class="table-responsive">
          <table class="align-middle mb-0 table table-borderless table-striped table-hover">
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
                <th>TITLE</th>
                <th class="text-center">AUTHOR</th>

                <th class="text-center">STATUS</th>
                <th colspan="2" class="text-center">ACTIONS</th>
              </tr>
            </thead>
            <tbody  style = "font-size:16px; ">
              <?php foreach ($posts as $key => $post): ?>
              <tr>
                <td class="text-center text-muted"><?php echo $key + 1; ?></td>
                <td>
                  <div class="widget-content p-0">
                    <div class="widget-content-wrapper">
                      <div class="widget-content-left mr-3">
                        <div class="widget-content-left">
                          <img width="40" class="rounded-circle"
                            src="<?php echo "../../assets/images/" . $post['image']; ?>"
                            alt="<?php echo $post['title'] . ' image'; ?>">
                        </div>
                      </div>
                      <div class="widget-content-left flex2">
                        <div class="widget-heading"><?php echo $post['title']; ?></div>
                        <div class="widget-subheading opacity-7" style="font-size: 14px;"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></div>
                      </div>
                    </div>
                  </div>
                </td>
               
              <td class="text-center"><?php echo $post['username']; ?></td>
            
                <td class="text-center" style = "font-size:12px; ">
                  <?php if ($post['published']): ?>
                  <div class="badge badge-success">published</div>
                  <?php else: ?>
                  <div class="badge badge-warning">unpublished</div>
                  <?php endif; ?>

                </td>
                <td class="text-center">
                <td> <button type="button" class="btn btn-info btn-md"><a
                      href="edit.php?id=<?php echo $post['id']; ?>" class="edit">edit</a></button>
                </td>
                <td> <button type="button" class="btn btn-danger btn-md"><a
                      href="edit.php?del_id=<?php echo $post['id']; ?>" class="delete">delete</a></button>
                </td>

                <?php if ($post['published']): ?>
                <td> <button type="button" class="btn btn-primary btn-md"><a
                      href="edit.php?published=0&p_id=<?php echo $post['id']; ?>"
                      >unpublish</a></button>
                </td>
                <?php else: ?>

                <td><button type="button" class="btn btn-primary btn-md"><a
                      href="edit.php?published=1&p_id=<?php echo $post['id']; ?>" class="publish">publish</a></button>
                  <?php endif; ?>


                </td>



                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>


      </div>
    
       <section></section>





      <?php include ROOT_PATH . "/inlcudes/admin_footer.php" ?>
