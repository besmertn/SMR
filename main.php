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
        <table>
            <tr>
                <td><p>Show <?php echo $_SESSION['username'];  ?>'s notes </p></td>
                <td><input type="submit" value="Show"></td>
            </tr>
        </table>


    </form>
    <form action="addNote.php" method="POST">
        <table>
            <tr>
                <td><p>Title</p></td>
                <td><input type="text" size="30" name="title"></td>
            </tr>
            <tr>
                <td><p>Content</p></td>
                <td><textarea name="content" rows="15" cols="40"> </textarea>
                </td>
            </tr>
            <tr>
                <td><p>Add note</p></td>
                <td><input type="submit" value="Add"></td>
            </tr>
        </table>


    </form>
    <form action="logOut.php" method="POST">
        <input type="submit" value="LogOut">
    </form>
</body>
</html>
