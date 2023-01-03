<?php
 error_reporting(0);
include '../../path.php';
// include "./app/database/db.php";
// include("./app/controllers/validate_topic.php");

include(ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/controllers/access_cntrl.php");
include(ROOT_PATH . "/app/controllers/validate_posts.php");

$topics = selectAll('topics');

$table = "post";
$posts = selectAll($table);

$errors = array();

$id = "";
$title = "";
$subtitle = "";
$body = "";
$topic_id = "";
$published = "";


if (isset($_GET['id'])) {

    $post = selectOne($table, ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $subtitle = $post['sub_title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'];
    $published = $post['published'];


    // rr($post);

}


if (isset($_GET['del_id'])) {
    admin_only();
    $id = $_GET['del_id'];

    $count = delete($table , $id);

    $_SESSION['status'] = "Post deleted successfully";
    $_SESSION['type'] = "alert-success";

    header("Location: http://localhost/PHP_Tutorials/blog/admin/post/index.php");
    exit();


   

}

if(isset($_GET['published']) && isset($_GET['p_id'])){
    admin_only();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];

    $count = update($table, $p_id, ['published' => $published]);
    
    $_SESSION['status'] = "Post published state changed";
    $_SESSION['type'] = "alert-success";

    header("Location: http://localhost/PHP_Tutorials/blog/admin/post/index.php");
    exit();

}



if (isset($_POST['add_post'])) {
    admin_only();

    $errors = validate_post($_POST);

    if (!empty($_FILES['image']['name'])) {

        $image_name = time() . '_' . $_FILES['image']['name'];
        $dir = ROOT_PATH . "/assets/images/" . $image_name;
        $results = move_uploaded_file($_FILES['image']['tmp_name'], $dir);

        if ($results) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }


    } else {
        array_push($errors, "Image required");
    }


    if (count($errors) == 0) {

        unset($_POST['add_post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;

        $_POST['body'] = htmlentities($_POST['body']);

        $post_id = create($table, $_POST);

        $_SESSION['status'] = "Post created successfully";
        $_SESSION['type'] = "alert-success";

        header("Location: http://localhost/PHP_Tutorials/blog/admin/post/index.php");

    } else {

        $title = $_POST['title'];
        $subtitle = $_POST['sub_title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;


    }


}


if (isset($_POST['edit_post'])) {
    admin_only();
    $id = $_POST['id'];
   
    // $errors = validate_post($_POST);
   
   

    if (!empty($_FILES['image']['name'])) {

        $image_name = time() . '_' . $_FILES['image']['name'];
        $dir = ROOT_PATH . "/assets/images/" . $image_name;
        $results = move_uploaded_file($_FILES['image']['tmp_name'], $dir);

        if ($results) {
            $_POST['image'] = $image_name;
        } else {
            array_push($errors, "Failed to upload image");
        }


    } else {
        array_push($errors, "Image required");
    }


    if (count($errors) == 0) {
      
        unset($_POST['edit_post'] , $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;

        $_POST['body'] = htmlentities($_POST['body']);

        $post_id = update($table , $id , $_POST);

        $_SESSION['status'] = "Post updated successfully";
        $_SESSION['type'] = "alert-success";

        header("Location: http://localhost/PHP_Tutorials/blog/admin/post/index.php");
        exit();
    } else {

       
        $title = $_POST['title'];
        $subtitle = $_POST['sub_title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;


    }


}



?>