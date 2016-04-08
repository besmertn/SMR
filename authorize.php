<?php
    include "dbConfig.php";
    session_start();
    $userName = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['username'] = $userName;
    $_SESSION['check'] = false;
    $query = "SELECT * FROM users";
    $us = mysqli_query($dbcnx, $query);
    $status = "false";
    if($us)
        {
            while($users = mysqli_fetch_array($us, MYSQLI_ASSOC))
            {
              if(strcmp($users['name'], $userName) == 0 && password_verify($password,$users['password'])){
                  $_SESSION['userid'] = $users['user_id'];
                  mysqli_close($dbcnx);
                  echo $status = "true";
              }
            }
            echo $status;

        }
        else
        {
          echo "<p><b>Error: ".mysqli_error($dbcnx)."</b></p>";
          exit();
        }

?>
