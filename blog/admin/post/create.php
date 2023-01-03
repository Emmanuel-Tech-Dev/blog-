<?php
$page_title =  "Create Post Page";
include "../../path.php";
include ROOT_PATH . "/inlcudes/admin_head.php";
include ROOT_PATH . "/app/controllers/posts.php";
admin_only();

// 
?>


<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

    <?php include ROOT_PATH . "/inlcudes/admin_nav.php" ?>

    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
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
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
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
                            <a href="index.php" class="mm-active">
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

        <div class="app-main__outer">
            <div class="app-main__inner p-5">
                <div class="app-page-title">
                    <div class="page-title-wrapper">
                        <div class="page-title-heading">
                            <div>Create New Post
                                <div class="page-title-subheading">This is an example dashboard created using build-in
                                    elements and components.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="content">





                    <form action="create.php" method="POST" enctype="multipart/form-data">

                        <?php if (count($errors) > 0):
                        ?>

                        <div class=" alert alert-danger">
                            <?php foreach ($errors as $error): ?>
                            <h5>
                                <?php echo $error ?>
                            </h5>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <div>
                            <label>Title</label>
                            <input type="text" name="title" class="text-input" value="<?php echo $title; ?>">

                        </div>
                        <div>
                            <label>Sub-Title</label>
                            <input type="text" name="sub_title" class="text-input" value="<?php echo $subtitle; ?>">

                        </div>
                        <div>
                            <label>Body</label>
                            <textarea name="body" id="body"><?php echo $body; ?></textarea>
                        </div>


                        <div>
                            <label>Image</label>
                            <input type="file" name="image">
                        </div>

                        <div>
                            <label>Topic</label>
                            <select name="topic_id">
                                <option></option>
                                <?php foreach ($topics as $key => $topic): ?>

                                <?php if (!empty($topic_id) && $topic_id == $topic['id']): ?>
                                <option selected value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?>
                                </option>

                                <?php else: ?>
                                <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>

                                <?php endif; ?>


                                <?php endforeach; ?>




                            </select>
                        </div>
                        <div>

                            <?php if (empty($published)): ?>

                            <div class="input-group mt-4 ">
                                <div class="input-group-text ">
                                    <label class="check">
                                        <input class="form-check-input " type="checkbox" name="published">
                                        Publish blog content</label>
                                </div>

                            </div>

                            <?php else: ?>

                            <div class="input-group mt-4 ">
                                <div class="input-group-text mr-3 ">
                                    <label class="check ">
                                        <input class="form-check-input " type="checkbox" name="published" checked>
                                </div>

                            </div>
                            <?php endif; ?>



                        </div>




                    

        <div>
            <button type="submit" name="add_post">Add Post</button>
        </div>

        </form>


    </div>
    </div>





<?php include ROOT_PATH . "/inlcudes/admin_footer.php" ?>