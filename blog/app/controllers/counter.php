
<?php

// $table = 'counter';


// $count_my_page = ("counter.txt");
// $hits = file($count_my_page);
// $hits[0] ++;
// $fp = fopen($count_my_page , "w");
// fputs($fp , "$hits[0]");
// fclose($fp);
// // echo $hits[0];


// $counter  = create($table , $hits[0])

$sql = "SELECT * FROM `counter`";

$run = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($run)){
    $no = $row['counter'];
    $no1 = $no + 1;
    $update = "UPDATE `visitor` SET `counter` = $no1 WHERE 1";

    $update_run = mysqli_query($conn, $update);
    echo $no;

}




?>


