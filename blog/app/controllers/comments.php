<?php


$table = 'comment';

$id = "";
$post_id = "";
$name = "";
$message = "";

if (isset($_POST['comment'])) {

    users_only(); 

 unset($_POST['comment']);

if(!empty($_POST)){

    $id = $_POST['id'];
    $post_id =  $_POST['post_id'];
    $name = $_POST['name'];
    $message =  $_POST['message'];
    
    $user_id = create($table, $_POST); 


   
}
        
         
   
}



?>