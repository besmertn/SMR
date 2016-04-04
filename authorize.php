<?php
    include "dbConfig.php";
    session_start();
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $userName;
    $query = "SELECT * FROM users";
    $us = mysqli_query($dbcnx, $query);
    if($us)
        {
            while($users = mysqli_fetch_array($us, MYSQLI_ASSOC))
            {
              if(strcmp($users['name'], $userName) == 0 && strcmp($users['password'], $password) == 0){
                  mysqli_close($dbcnx);
                  header("Location:main.php?");
              }
            }

        }
        else
        {
          echo "<p><b>Error: ".mysqli_error($dbcnx)."</b></p>";
          exit();
        }

?>
