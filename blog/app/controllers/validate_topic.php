<?php 


function validate_topic($topic){
    $errors = array();


    if (empty($topic['name'])) {
        array_push($errors, 'Topic name is required');
    }

   
    // checking for already existing email address using the selectOne function created in the db.php file
    $existing_topic = selectOne('topics', ['name' => $topic['name']]);

   if($existing_topic){

    if(isset($_POST['update_topic']) && $existing_topic['id'] != $topic['id']){
        array_push($errors, 'Topic already exists');
    }
    if(isset($_POST['add_topic'])){
        array_push($errors, 'Topic content with that title already exists');
   
    }

   }

    return $errors;
}





?>