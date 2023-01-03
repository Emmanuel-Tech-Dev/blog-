<?php
// error_reporting(0);
session_start();
require "connect.php";


// function to display the values to the screen
function rr($value){
    echo "<pre>" . print_r($value) . true. "</pre>";
    die();
}

//function to perform a query execution using prepared statement
function executeQuery($sql , $data){

    global $conn; //initialize a global varible for the connection

    $stmt = $conn->prepare($sql); // start prepared statement

    $values = array_values($data); //pass the data values in an array
    $types = str_repeat("s", count($values)); // check for the value type ie: string
    $stmt->bind_param($types , ...$values); // bind the data type and data value
    $stmt->execute();// execute the statement
    return $stmt; //return the statement

}

// function to select all input data from the user table in the databae
function selectAll($table , $conditions = []){

    global $conn; //initialize a global varible for the connection
    $sql = "SELECT * FROM $table";  // perform a mysli query

    //check if the conditions empty ie: username , password , email
    if(empty($conditions)){

        $stmt = $conn->prepare($sql); // start prepared statement
        $stmt->execute();//execute statement
    
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // get and  fetch all mysli associative array
        return $records; // return the records from the table
    }
   else{


        $i = 0;
        //loop through the condition 

    foreach($conditions as $key => $value){
         if($i === 0){
                $sql = $sql . " WHERE $key=?"; // if there is nomore data fields end
         }else{
                $sql = $sql . " AND $key=?";  // add another data field
                
         }
         $i++; // increament
        }
        $stmt = executeQuery($sql , $conditions); // execute query using the executeQuery function

        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // get and  fetch all mysli associative array
        return $records; // return the records from the table
   }

}
function selectOne($table , $conditions = []){

    global $conn;
    $sql = "SELECT * FROM $table";

        $i = 0;
    foreach($conditions as $key => $value){
         if($i === 0){
                $sql = $sql . " WHERE $key=?";
         }else{
                $sql = $sql . " AND $key=?";
         }
         $i++;
        }

     $sql = $sql . " LIMIT 1"; // select a limt of 1 to the query i.e because we are select only one row for the table
       
    $stmt = executeQuery($sql , $conditions);

        $records = $stmt->get_result()->fetch_assoc();
        return $records;
   }


   function create($table , $data){
   
    global $conn;

    $sql = "INSERT INTO $table SET ";

    $i = 0;
   
    foreach($data as $key => $value){
         if($i === 0){
                $sql = $sql . " $key=?";
         }else{
                $sql = $sql . ", $key=?";
         }
         $i++;
        }
      

    $stmt = executeQuery($sql, $data);
    $id = $stmt->insert_id;
    return $id;
   }

   


   
   function update($table ,$id, $data){
   
    global $conn;

    $sql = "UPDATE $table SET ";

    $i = 0;
   
    foreach($data as $key => $value){
         if($i === 0){
                $sql = $sql . " $key=?";
         }else{
                $sql = $sql . ", $key=?";
         }
         $i++;
        }

    $sql = $sql . " WHERE id=?";
    $data["id"] = $id;
    $stmt = executeQuery($sql, $data);
   
    return $stmt->affected_rows;
   }
   
  
   function delete($table ,$id){
   
    global $conn;

    $sql = "DELETE FROM $table WHERE id=?";

  
    $stmt = executeQuery($sql,['id' => $id]);
   
    return $stmt->affected_rows;
   }


   function getpublish(){
       global $conn;

       $sql = 'SELECT p.*, u.username FROM post AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?';
  
       $stmt = executeQuery($sql , ['published' => 1]); // execute query using the executeQuery function

       $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // get and  fetch all mysli associative array
       return $records;
}
// function getpublishUser(){
//        global $conn;

//        $sql = 'SELECT p.*, u.username FROM post AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=?';
  
//        $publised = ['published' => 1]; 
//        $stmt = executeQuery($sql , $publised   ); // execute query using the executeQuery function

//        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // get and  fetch all mysli associative array
//        return $records;
// }
function get_topic($topic_id){
       global $conn;

       $sql = 'SELECT p.*, u.username FROM post AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND topic_id=?';
  
       $stmt = executeQuery($sql , ['published' => 1, 'topic_id' => $topic_id]); // execute query using the executeQuery function

       $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // get and  fetch all mysli associative array
       return $records;
}
 function search($term){
      

       global $conn;
       $match = '%' . $term . '%';

       $sql = 'SELECT p.*, u.username FROM post AS p JOIN users AS u ON p.user_id=u.id WHERE p.published=? AND p.title LIKE ? OR p.body LIKE ?';
  
       $stmt = executeQuery($sql , ['published' => 1 , 'title' => $match , 'body' => $match]); // execute query using the executeQuery function

       $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // get and  fetch all mysli associative array
       return $records;
}

function recentpost(){
      

       global $conn;
       $sql = "SELECT * FROM post ORDER BY id DESC LIMIT 1";
       $stmt = executeQuery($sql , ['published' => 1]); // execute query using the executeQuery function

       $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // get and  fetch all mysli associative array
       return $records;
}

function getvisitors($id){
     
       global $conn;
       
       $ip = $_SERVER['REMOTE_ADDR'];

       if(!empty($ip)){

             

              $sql = "SELECT views FROM post WHERE id=? ";
              $stmt = executeQuery($sql, ['id' => $id]);
              $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC); // get and  fetch all mysli associative array
       
              return $records;
       }
}


?>