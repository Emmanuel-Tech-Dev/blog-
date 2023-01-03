<?php
error_reporting(0);
include '../../path.php';
// include "./app/database/db.php";
// include("./app/controllers/validate_topic.php");

include (ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/controllers/access_cntrl.php");
include (ROOT_PATH . "/app/controllers/validate_topic.php");


$errors = array();
$table = 'topics';
$topics = selectAll($table);

$id = "";
$name = "";
$desc = "";

if(isset($_POST['add_topic'])){
    admin_only();
    $errors = validate_topic($_POST);
    
    if(count($errors) === 0){

        unset($_POST['add_topic']);

        $topic_id =  create($table, $_POST);
     
         $_SESSION['status'] = "Topic created successfully";
         $_SESSION['type'] = "alert-success";
     
         header("Location: http://localhost/PHP_Tutorials/blog/admin/topic/index.php");
     
         exit();
    }else{

        $name = $_POST['name'];
$desc = $_POST['description'];
    }


  
}


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);

    $id = $topic['id'];
$name = $topic['name'];
$desc = $topic['description'];

}

if(isset($_GET['del_id'])){
    admin_only();
    $id = $_GET['del_id'];

     $count = delete($table , $id);
   
    $_SESSION['status'] = "Topic deleted successfully";
    $_SESSION['type'] = "alert-success";

    header("Location: http://localhost/PHP_Tutorials/blog/admin/topic/index.php");
    exit();

}

if(isset($_POST['update_topic'])){
    admin_only();
    $errors = validate_topic($_POST);
    
    if(count($errors) === 0){
        $id = $_POST['id'];
        unset($_POST['update_topic'] , $_POST['id']) ;
      
        $topic_id = update($table, $id, $_POST);
       
        $_SESSION['status'] = "Topic updated successfully";
        $_SESSION['type'] = "alert-success";
    
        header("Location: http://localhost/PHP_Tutorials/blog/admin/topic/index.php");
        exit();
    }else{
        $id = $_POST['id'];
        $name = $_POST['name'];
        $desc = $_POST['description'];
    }
   
   
}


?>