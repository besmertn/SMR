<?php
        session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
</head>
<body>
    <form action="request.php" method="POST">
        <p>Show <?php echo $_SESSION['username'];  ?>'s notes </p>
        <input type="submit" value="SHow">
    </form>
</body>
</html>
