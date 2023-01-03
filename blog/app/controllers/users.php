<?php
error_reporting(0);
include "../../path.php";

include (ROOT_PATH . "/app/database/db.php");
include(ROOT_PATH . "/app/controllers/access_cntrl.php");
include (ROOT_PATH . "/app/controllers/validate.php");

$errors = array();

$username = "";
$email = "";
$password = "";
$cpassword = "";
$table = "users";
$admin= "";
$id = "";
$users = selectAll($table );

function login_user($user){
   
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['status'] =" You are logged in succsessfully";
    $_SESSION['type'] = 'alert-success';

    if($_SESSION['admin']){
        header('Location: http://localhost/PHP_Tutorials/blog/admin/dashboard-2.php');
    }else{
        header("Location: http://localhost/PHP_Tutorials/blog/index.php");
   
    } 
    exit();

}


if (isset($_POST['signup_btn'])) {

//    Validating our user using the validate function created in the validate.php file
    $errors = validate($_POST);
    //  rr($errors);

// Check if there are no validation errors create the user using the create function in the db.php
    if (count($errors) === 0) {
      
        unset($_POST['signup_btn'], $_POST['cpassword']);
        $_POST['admin'] = 0;
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $user_id = create($table, $_POST);
        $user = selectOne($table, ['id' => $user_id]);
        // Logging the user in    
        login_user($user);

    } else {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        
    }



}

if (isset($_POST['signup_btn'])  || isset($_POST['add_admin'])) {

//    Validating our user using the validate function created in the validate.php file
    $errors = validate($_POST);
    //  rr($errors);

// Check if there are no validation errors create the user using the create function in the db.php
    if (count($errors) === 0) {
      
        unset($_POST['signup_btn'], $_POST['cpassword'] , $_POST['add_admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if(isset($_POST['admin'])){
           
            $_POST['admin'] = 1;
            $user_id = create($table, $_POST);       
            $_SESSION['status'] = "Admin user created successfully";
            $_SESSION['type'] = "alert-success";

            header("Location: http://localhost/PHP_Tutorials/blog/admin/users/index.php");
              exit();


        }else{

            $_POST['admin'] = 0;
            $user_id = create($table, $_POST);
            $user = selectOne($table, ['id' => $user_id]);
            // Logging the user in    
            // login_user($user);
            $_SESSION['status'] = "Other user created successfully";
            $_SESSION['type'] = "alert-success";

            header("Location: http://localhost/PHP_Tutorials/blog/admin/users/index.php");
            exit();


        }
 

    } else {

        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $admin= isset($_POST['admin']) ? 1 : 0;

    }



}


if(isset($_POST['update_admin'])){
    admin_only();
    $id = $_POST['id'];
   // Validating our user using the validate function created in the validate.php file
    $errors = validate($_POST);
    //  rr($errors);

// Check if there are no validation errors create the user using the create function in the db.php
    if (count($errors) === 0) {
       
        unset($_POST['update_admin'], $_POST['cpassword'] , $_POST['id']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
           
            $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
            $user_id = update($table ,$id , $_POST);       
            $_SESSION['status'] = "Admin user updated";
            $_SESSION['type'] = "alert-success";

         header("Location: http://localhost/PHP_Tutorials/blog/admin/users/index.php");
        exit();

        }
 

    } else {

        $username = $user['username'];
        $email = $user['email'];
        $password = $user['password'];
        $cpassword = $user['cpassword'];
        $admin= isset($user['admin']) ? 1 : 0;

    }





if(isset($_GET['id'])){
    $user = selectOne($table , ['id' => $_GET['id']]);

    // rr($user);
    $id = $user['id'];
    $username = $user['username'];
    $email = $user['email'];
    $admin= isset($user['admin']) ? 1 : 0;
}




if(isset($_POST['login_btn'])){
    $errors = validate_login($_POST);

    if(count($errors) === 0){
        $user = selectOne($table , ['username' => $_POST['username']]);

        if($user && password_verify($_POST['password'] , $user['password'])){

             // Logging the user in    
             login_user($user);

        }else{

            array_push($errors, "Wrong login in credentials");
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

}


if(isset($_GET['del_id'])){
    admin_only();
    $id = $_GET['del_id'];

    $count = delete($table, $id);
    
    $_SESSION['status'] = "Admin user deleted";
    $_SESSION['type'] = "alert-success";

    header("Location: http://localhost/PHP_Tutorials/blog/admin/users/index.php");
    exit();


}
?>