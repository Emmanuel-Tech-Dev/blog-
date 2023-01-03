<?php 

function users_only($redirect ='index.php'){

    if(empty($_SESSION['id'])){
        $_SESSION['status'] = 'You must login first';
        $_SESSION['type'] = 'alert-danger';
        header("Location:" . $redirect);
        exit();
    }

}
function admin_only($redirect = '/index.php'){
    if(empty($_SESSION['id']) || empty($_SESSION['admin'])){
        $_SESSION['status'] = 'You are not authorized';
        $_SESSION['type'] = 'alert-danger';
        header("Location:" . $redirect);
        exit();
    }
}
function guest_only($redirect = 'index.php'){
    if(isset($_SESSION['id'])){
        header("Location: " . $redirect);
        exit();
    }
}

?>