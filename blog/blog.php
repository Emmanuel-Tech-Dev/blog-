<?php

$page_title = "Blog Entries";

include "path.php";
include(ROOT_PATH . "/app/controllers/topics.php");
include (ROOT_PATH . "/inlcudes/header.php");

$posts = array();

$num_page = 04;

 if(isset($_GET['id'])){

  $posts = get_topic($GET['id']);
  
 }
  elseif(isset($_POST['search'])){

  $posts = search($_POST['search']);

 }else{

  $posts = getpublish();
  
}

 $comments = selectAll('comment',['post_id' => $_GET['id']]);

if(isset($_GET['page'])){
  $page = $_GET['page'];

}else{
  $page = 1;
}

$start_count = ($page - 1) * 04;

$sql = "SELECT p.*, u.username FROM post AS p JOIN users AS u ON p.user_id=u.id WHERE published=1 LIMIT $start_count , $num_page  ";
$posts = mysqli_query($conn , $sql);


?>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
   
<?php
include ( ROOT_PATH . "/inlcudes/navbar.php");
?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Recent Posts</h4>
                <h2>Our Recent Blog Entries</h2>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    
    <!-- Banner Ends Here -->

    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">

              <?php foreach ($posts as $post): ?>
                <div class="col-lg-6">

               
                  <div class="blog-post">
                    <div class="blog-thumb">
                    <img class="w-100" style="width: 100%; height:300px ;" src="<?php echo "./assets/images/" . $post['image']; ?>" alt="<?php echo $post['title'] . ' image'; ?>">
                    </div>

                    
            <div class="meta-category">
           
              
            </div>

                    <div class="down-content">
                      <a href="postpage.php?id=<?php echo $post['id'];?>">
            <span><?php echo $post['title']; ?></span>
            </a>
            <ul class="post-info">
                    <li><a href="#"><?php echo $post['username']; ?></a></li>
                    <li><a href="#"><?php echo date('F j, Y', strtotime($post['created_at']));?></a></li>
                    <li><a href="#"><?php echo count($comments);?> Comments</a></li>
                  </ul>
                     
                   <p class="" > <?php echo html_entity_decode(substr($post['body'], 0, 550) . '...'); ?> 
                    <a  href="postpage.php?id=<?php echo $post['id'];?>"> Read More </a> 
                   </p> 
                    <div class="post-options">
                        <div class="row">
                          <div class="col-lg-12">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#"></a>,</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                
                </div>
                <?php endforeach; ?>
                
               
               
               
                <div class="col-lg-12">
                  <ul class="page-numbers">
                 <?php 
                 
                 $post = "SELECT p.*, u.username FROM post AS p JOIN users AS u ON p.user_id=u.id WHERE published=1";
                 $results = mysqli_query($conn , $post);
                 $total_records = mysqli_num_rows($results);
                 $total_pages = ceil($total_records / $num_page);
                 ?>

                 <?php for($i=1 ; $i<=$total_pages; $i++):?>
                  <li  class="<?php if ($page == $i)
                     echo 'active'; ?>"><a href="blog.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                 
                  <?php endfor;?>
                   
                    <!-- <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li> -->
                    <li><a href="blog.php?page=<?php echo $i; ?>"><i class="fa fa-angle-double-right"></i></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="sidebar">
              <div class="row">
                <div class="col-lg-12">
                <div class="sidebar-item search">
                <form id="search_form" name="gs" method="POST" action="index.php">
                  <input type="text" name="search" class="searchText" placeholder="type to search..." autocomplete="on">
                </form>
              </div>
                </div>
                <div class="col-lg-12">
              <div class="sidebar-item recent-posts">
                <div class="sidebar-heading">
                  <h2>Recent Posts</h2>
                </div>
                <div class="content">
                  <ul>
                    <?php foreach($posts as $post): ?>
                   
                    <li><a href="postpage.php?id=<?php echo $post['id'];?>">
                        <h5><?php echo $post['title']; ?></h5>
                        <span><?php echo date('F j, Y', strtotime($post['created_at']));?></span>
                      </a></li>
                      <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="sidebar-item categories">
                <div class="sidebar-heading">
                  <h2>Categories</h2>
                </div>
                <div class="content">
                  <ul>

                    <?php foreach ($topics as $key => $topic): ?>
                      
                      <li><a href="postpage.php?id=<?php echo $post['id'];?>">- <?php echo $topic['name']; ?></a></li>
                              

                    <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="sidebar-item tags">
                <div class="sidebar-heading">
                  <h2>Tag Clouds</h2>
                </div>
                <div class="content">
                  <ul>

                  <?php foreach ($topics as $key => $topic): ?>
                      
                      <li><a href="#"><?php echo $topic['name']; ?></a></li>
                              

                    <?php endforeach; ?>

                    
                  </ul>
                </div>
              </div>
            </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php    
include (ROOT_PATH . "/inlcudes/footer.php");
?>