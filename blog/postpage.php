<?php

$page_title =  "Blog Content-Page";

include "path.php";
include ROOT_PATH .  "/inlcudes/header.php";
include(ROOT_PATH . "/app/controllers/posts.php");
include(ROOT_PATH . "/app/controllers/comments.php");

if(isset($_GET['id'])){
   $post = selectOne('post', ['id' => $_GET['id']]);
}else{
  $posts = getpublish();
}

$id = $_GET['id'];
$post_id = ['post_id' => $id];
$comments = selectAll('comment', $post_id);

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
    include ROOT_PATH . "/inlcudes/navbar.php";
    ?>



    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="heading-page header-text">
      <section class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="text-content">
                <h4>Post Details</h4>
                <h2><?php echo $post['title']?></h2>
              </div>
            </div>
          </div>
        </div>
      </section>
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
   
    <section class="blog-posts grid-system">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <div class="all-blog-posts">
              <div class="row">
                <div class="col-lg-12">
                  <div class="blog-post" >
                    <div class="blog-thumb">
                      <img style="width: 100%; height: 440px;"  src="<?php echo "./assets/images/" . $post['image']; ?>" alt="<?php echo $post['title'] . ' image'; ?>">
                    </div>
                    <div class="down-content" >
                     <div class="title">
                     <a href="#"><span><?php echo $post['title'];?></span></a>
                      <a href="#"><h4><?php echo $post['sub_title'];?></h4></a>
                      <ul class="post-info">
                        <li><a href="#"> <?php echo $post['username'];?></a></li>
                        <li><a href="#"><?php echo date('F j, Y', strtotime($post['created_at']));?></a></li>
                        <li><a href="#"><?php echo count($comments);?> Comments</a></li>
                      </ul>
                      </div>
                      <div>
                      <p><?php echo html_entity_decode($post['body']); ?></p>
                      </div>
                     
                      <div class="post-options">
                        <div class="row">
                          <div class="col-6">
                            <ul class="post-tags">
                              <li><i class="fa fa-tags"></i></li>
                              <li><a href="#"><?php echo $post['topic']; ?></a></li>
                              
                            </ul>
                          </div>
                          <div class="col-6">
                            <ul class="post-share">
                              <li><i class="fa fa-share-alt"></i></li>
                              <li><a href="#">Facebook</a>,</li>
                              <li><a href="#"> Twitter</a></li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item comments">
                 
                  <div class="sidebar-heading">
                      <h2><?php echo count($comments); ?> Comments</h2>
                    </div>
                    <div class="content">
                      <ul>

                      <?php foreach ($comments as $comment): ?>
                     
                        <li class="w-100">
                          <div class="author-thumb">
                            <img class="rounded" src="assets/images/avatar_default.png" alt="default_avatar image" >
                          </div>
                          <div class="right-content w-100">
                            <h4><?php echo $comment['name']; ?><span><?php echo date('F j, Y', strtotime($comment['created_at']));?></span></h4>
                            <p><?php echo $comment['message'];?></p>
                          </div>
                        </li>
                        <?php endforeach; ?>

                       
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="sidebar-item submit-comment">
                    <div class="sidebar-heading">
                      <h2>Your comment</h2>
                    </div>
                    <div class="content">
                    
                      
                      <form id="comment" action="postpage.php?id=<?php echo $post['id'];?>" method="POST">
                        <div class="row">
                          
                              <input type="hidden" name="post_id"  value="<?php echo $post['id'];  ?>">
                           
                          <div class="col-md-6 col-sm-12">
                            <fieldset>
                              <input name="name" type="hidden" id="name" placeholder="Your name" required="" value="<?php echo $_SESSION['username'];?>">
                            </fieldset>
                          </div>
                       
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="message" rows="6" id="message" placeholder="Type your comment" required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" name="comment" class="main-button">comment</button>
                            </fieldset>
                          </div>
                        </div>

                        <script>
                          if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
                        </script>
                      </form>
                    </div>
                  </div>
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
                      
                      <li><a href="index.php?id=<?php echo $topic['id']?> " >- <?php echo $topic['name']; ?></a></li>
                              

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
                      
                      <li><a href="index.php?id=<?php $topic['id']; ?>"><?php echo $topic['name']; ?></a></li>
                              

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

include ROOT_PATH . "/inlcudes/footer.php";

?>
