<div class="app-header header-shadow">
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
            </div>    <div class="app-header__content">
                <div class="app-header-left">
                <a href="<?php echo BASE_URL . '/index.php';?>">
               Go to Homepage
                </a>
              </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                           
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <i class="fa fa-caret-down ml-2 opacity-8"></i>

                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                           <a href="<?php echo BASE_URL . '/admin/users/index.php';?>"><button type="button" tabindex="0" class="dropdown-item">User Account</button></a> 
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                       
                                            <a href="<?php echo BASE_URL . '/logout.php';?>"><button type="button" tabindex="0" class="dropdown-item">Sign Out</button></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                      <?php if(isset($_SESSION['admin'])): ?>
                                        <div><?php echo $_SESSION['username']; ?></div>
                                      <?php endif; ?>
                                    </div>
                                    <div class="widget-subheading">
                                       Admin User
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>      
                  </div>
            </div>

        </div>