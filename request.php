<!DOCTYPE html>
<html>
<head>
    <title>SQLRequest</title>
</head>
<body>
    <?php
        include "dbConfig.php";
        $query = "SELECT * FROM users;";
        $us = mysqli_query($dbcnx, $query);
        if($us)
        {
            while($users = mysqli_fetch_array($us, MYSQLI_ASSOC))
            {
              echo "<br>name = ".$users['name']."<br>";
              echo "password = ".$users['password']."<br>";
              echo "e-mail = ".$users['email']."<br>";
            }
        }
        else
        {
          echo "<p><b>Error: ".mysqli_error($dbcnx)."</b></p>";
          exit();
        }
    mysqli_close($dbcnx);
    ?>
</body>
</html>
