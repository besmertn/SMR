<?php
    include "dbConfig.php";
    $query = "SELECT * FROM users;";
    $name = $_POST['name'];
    $check = "false";
    $us = mysqli_query($dbcnx, $query);
    $t = true;
    $f = false;
    if($us)
    {
        while($users = mysqli_fetch_array($us, MYSQLI_ASSOC))
        {
            if(strcmp($users['name'], $name) == 0 || strcmp($users['email'], $name) == 0 ){
                $check = "true";
            }

        }
        echo $check;
     }
     else
     {
        echo "<p><b>Error: ".mysqli_error($dbcnx)."</b></p>";
        exit();
     }
     mysqli_close($dbcnx);
?>
