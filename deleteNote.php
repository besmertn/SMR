<?php
    session_start();
    include 'dbConfig.php';
    $userName = $_SESSION['username'];
    $id = $_POST['id'];
    $query = "DELETE FROM `SMP`.`notes_".$userName."` WHERE `note_id` = ".$id.";";
    mysqli_query($dbcnx, $query);
     mysqli_close($dbcnx);
?>
