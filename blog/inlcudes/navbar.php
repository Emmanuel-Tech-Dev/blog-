
<header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>Stand Blog<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="index.php">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.php">Blog Entries</a>
              </li>
              <?php if(isset($_SESSION['id'])): ?>

             
              <li class="nav-item dropdown">
               
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="fa fa-user"></i> <?php echo $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu">
            <?php if($_SESSION['admin']): ?>
            <li><a class="dropdown-item" href="http://localhost/PHP_Tutorials/blog/admin/dashboard-2.php">Dashboard</a></li>
            <?php endif;?>
            
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php">Log out</a></li>
          
           
          </ul>
        </li>
        <?php else: ?>
          <li class="nav-item">
                <a class="nav-link" href="login.php">Log In</a>
              </li>
             
            <?php endif; ?>  
            </ul>
          </div>
        </div>
      </nav>
    </header>