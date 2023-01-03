<?php 


function validate($user){
    $errors = array();


    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

    if (empty($user['email'])) {
        array_push($errors, 'Email is required');
    }

    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }

    if ($user['password'] !== $user['cpassword']) {
        array_push($errors, 'Password and Confirm Password does not match');
    }

    // checking for already existing email address using the selectOne function created in the db.php file
    $existing_user = selectOne('users', ['email' => $user['email']]);

   if($existing_user){
       if(isset($_POST['update_admin']) && $existing_user['id'] != $user['id']){
        array_push($errors, 'Email already exists');
       }

       if(isset($_POST['add_admin'])){
        array_push($errors, 'Email already exists');
     
       }
    


   }

    return $errors;
}


function validate_login($user){
    $errors = array();


    if (empty($user['username'])) {
        array_push($errors, 'Username is required');
    }

   
    if (empty($user['password'])) {
        array_push($errors, 'Password is required');
    }


    return $errors;
}






?>