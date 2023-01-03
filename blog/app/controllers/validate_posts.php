<?php

function validate_post($post){
    $errors = array();


    if (empty($post['title'])) {
        array_push($errors, 'Title is required');
    } 

    if (empty($post['body'])) {
        array_push($errors, 'Blog body is empty');
    }

    if (empty($post['topic_id'])) {
        array_push($errors, 'Please select a topic');
    }
    

   
    // checking for already existing email address using the selectOne function created in the db.php file
    $existing_post = selectOne('post', ['title' => $post['title']]);

   if($existing_post){

    if(isset($_POST['edit_post']) && $existing_post['id'] != $post['id']){

        array_push($errors, 'Post content with that title already exists');
   
    } 
    
    if(isset($_POST['add_post'])){
        array_push($errors, 'Post content with that title already exists');
   
    }
   }

    return $errors;
}



?>