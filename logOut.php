<?php
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['noteTitleArr']);
    unset($_SESSION['noteContentArr']);
    unset($_SESSION['noteDateArr']);
    unset($_SESSION['check']);
    session_destroy();
    header("Location:index.html");
?>
