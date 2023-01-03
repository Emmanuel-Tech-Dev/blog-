<?php
$page_title = "Admin Dashboard";
include "../path.php";
include "../inlcudes/admin_head.php";
include "../app/controllers/posts.php";

admin_only();
$table = 'users';
$users = selectAll($table);

?>


    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        
    <?php include ROOT_PATH . "/inlcudes/admin_nav.php" ?>
    
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
                                    <a href="dashboard-2.php" class="mm-active">
                                        <i class="fa fa-home pe-7s-rocket"></i>
                                     Home
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Blog Posts</li>
                                <li >
                                    <a href="../admin/post/index.php">
                                        <i class="fa fa-list pe-7s-diamond"></i>
                                         Manage Posts
                                       
                                    </a>
                                 
                                </li>
                                
                                <li class="app-sidebar__heading">Admin Users</li>
                                <li>
                                    <a href="../admin/users/index.php">
                                        <i class="fa fa-user pe-7s-display2"></i>
                                         Manage Admin Users
                                    </a>
                                </li>
                                <li class="app-sidebar__heading">Blog Topics</li>
                                <li>
                                    <a href="../admin/topic/index.php">
                                    <i class="fa fa-table pe-7s-mouse">
                                        </i> Manage Topics
                                    </a>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>   
                 <div class="app-main__outer  h-100">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                    <i class="fa fa-rss" style="color:orange;"></i>
                                   
                                    </div>
                                   
                                    <div>Blog Dashboard
                                        <div class="page-title-subheading">Welcome <?php  echo $_SESSION['username']; ?>
                                        </div>
                                       
                                    </div>

                                </div>
                                 
                            </div>
                        </div>
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
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-midnight-bloom">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Total Posts</div>
                                            <div class="widget-subheading">Number of post</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo count($posts); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-arielle-smile">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Topics</div>
                                            <div class="widget-subheading">Total blog topics</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo count($topics); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content bg-grow-early">
                                    <div class="widget-content-wrapper text-white">
                                        <div class="widget-content-left">
                                            <div class="widget-heading">Users</div>
                                            <div class="widget-subheading">Registered users</div>
                                        </div>
                                        <div class="widget-content-right">
                                            <div class="widget-numbers text-white"><span><?php echo count($users); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                   
                       
                       
                    </div>
    


<?php include "../inlcudes/admin_footer.php" ?>
