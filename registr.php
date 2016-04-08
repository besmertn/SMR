<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];
    $email = $_POST['email'];
    $options = [
    'cost' => 11,
    'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
        ];
    $hash =  password_hash($password, PASSWORD_BCRYPT, $options);
    include "dbConfig.php";
    $query = "INSERT INTO `SMP`.`users` (`name`, `password`, `email`, `user_id`) VALUES ('".$username."', '".$hash."', '".$email."', NULL)";
    mysqli_query($dbcnx,$query);
    mysqli_close($dbcnx);
    header("Location:index.html");
?>
