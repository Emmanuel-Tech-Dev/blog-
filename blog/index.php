<?php
 $page_title = "Em's Blog Page";
include "path.php";

 include(ROOT_PATH . "/app/controllers/topics.php");
  include(ROOT_PATH . "/app/controllers/counter.php"); 
include (ROOT_PATH . "/inlcudes/header.php");




$posts = array();



 if(isset($_GET['id'])){

  $posts = get_topic($GET['id']);

 }
  elseif(isset($_POST['search'])){

  $posts = search($_POST['search']);

 }else{

  $posts = getpublish();

 }

 $comments = selectAll('comment' , $post['post_id']);

//  $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 2";
  $sql = 'SELECT p.*, u.username FROM post AS p JOIN users AS u ON p.user_id=u.id WHERE published=1 ORDER BY id  DESC LIMIT 2  ' ;

$sql_run = mysqli_query($conn, $sql);

// rr($posts);
$visitors = getvisitors($id);
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

<?php
include ( ROOT_PATH . "/inlcudes/navbar.php");
?>



<!-- Page Content -->
<!-- Banner Starts Here -->
<div class="main-banner  header-text  ">

  <div class="container-fluid">

    <div class="owl-banner owl-carousel ">
   
    
    <?php foreach ($posts as $post): ?>
                      
      <div class="item">
     
      <div class="bg-image img-data">
      <img class="w-100 img-data" style="width: 100%; height:400px ;" src="<?php echo "./assets/images/" . $post['image']; ?>" alt="<?php echo $post['title'] . ' image'; ?>">
     
  <div class="mask" style="background-color: rgba(0, 0, 0, 0.5)"></div>
</div>
     
       <div class="item-content">
          <div class="main-content">
       
            <div class="meta-category">
            <a href="postpage.php?id=<?php echo $post['id'];?>">
            <span><?php echo $post['title']; ?></span>
            </a>
              
            </div>
           
            <ul class="post-info">
              <li><a href="postpage.php?id=<?php echo $post['id'];?>">
                  <?php echo $post['username'];
                  ?>
                </a></li>
              <li><a href="postpage.php?id=<?php echo $post['id'];?>"><?php echo date('F j, Y', strtotime($post['created_at']));?></a></li>
               <li><a href="#"><?php echo count($comments);?> Comments</a></li> 
                
            </ul>
          </div>
        </div>
      </div>
                              

         <?php endforeach; ?>


<!--       -->
    </div>
  </div>
</div>


<!-- Banner Ends Here -->

 <section class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="main-content">

              <div class="row">
                <div class="col-lg-8 ">
                  <span>BEST BLOG SITE</span>
                  <h4>Catch all the latest Tech News Here!</h4>
                </div>
                <div class="col-lg-4">
                  <div class="main-button">
                    <a rel="nofollow" href="<?php echo BASE_URL . '/blog.php'; ?>" target="_parent">View More!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> 


<section class="blog-posts">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 ">
    
      <div class="all-blog-posts">
      
      <?php foreach ($sql_run as $post): ?>
          <div class="row">
            <div class="col-lg-12">


              <div class="blog-post">
                <div class="blog-thumb" >
                  <img class=" " style="width: 100%; height:440px ;" src="<?php echo "./assets/images/" . $post['image']; ?>" alt="<?php echo $post['title'] . ' image'; ?>">
                </div>
                <div class="down-content">
                 <div class="title">
                 <a href="postpage.php?id=<?php echo $post['id'];?>">
                <span><?php echo $post['title']; ?></span>
                </a>
                  <a href="postpage.php?id=<?php echo $post['id'];?>">
                    <h4><?php echo $post['sub_title']; ?></h4>
                  </a>
                  <ul class="post-info">
                    <li><a href="#"><?php echo $post['username']; ?></a></li>
                    <li><a href="#"><?php echo date('F j, Y', strtotime($post['created_at']));?></a></li>
                    <li><a href="#"><?php echo count($comments);?> Comments</a></li>
                  </div>
                 <div>
               
                   <p class="" > <?php echo html_entity_decode(substr($post['body'], 0, 550) . '...'); ?> 
                    <a  href="postpage.php?id=<?php echo $post['id'];?>"> Read More </a> for
                    more info. Thank you.
                    </p>
                 </div>
                 
                  <div class="post-options">
                    <div class="row">
                      <div class="col-6">
                        <ul class="post-tags">
                        
                          <li><i class="fa fa-tags"></i></li>
                          <li><a href="#"><?php echo $topic['topic']; ?></a>,</li>
                        
                        </ul>
                      </div>
                      <!-- <div class="col-6">
                        <ul class="post-share">
                          <li><i class="fa fa-share-alt"></i></li>
                          <li><a href="#">Facebook</a>,</li>
                          <li><a href="#"> Twitter</a></li>
                        </ul>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
          
            </div>  
           </div>
          <?php endforeach; ?>
        </div>
        <div class="col-lg-12">
              <div class="main-button">
                <a href="blog.php">View All Posts</a>
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
                    <?php foreach ($posts as $post): ?>
                   
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
    include "../blog/inlcudes/footer.php";
    ?>