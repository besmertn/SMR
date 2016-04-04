<?php
        session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SQLRequest</title>
</head>
<body>
    <?php
        include "dbConfig.php";
        $userName = $_SESSION['username'];
        if($userName != "admin"){
            $query = "SELECT * FROM notes_".$userName;
            $us = mysqli_query($dbcnx, $query);
            if($us)
            {
                while($notes = mysqli_fetch_array($us, MYSQLI_ASSOC))
                {
                  echo "<br>note id = ".$notes['note_id']."<br>";
                  echo "date = ".$notes['date']."<br>";
                  echo "title = ".$notes['title']."<br>";
                  echo "text = ".$notes['content']."<br>";
                }
            }
            else
            {
              echo "<p><b>Error: ".mysqli_error($dbcnx)."</b></p>";
              exit();
            }
            /*$query = "SELECT * FROM users;";
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
            }*/
        mysqli_close($dbcnx);
    }
    ?>
    <form>
        <input type="button" onclick="document.location.href = 'main.php'" value="Back">
    </form>
</body>
</html>
