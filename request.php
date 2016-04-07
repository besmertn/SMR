<?php
        session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>SQLRequest</title>
    <meta charset="utf-8">
     <script src="note.js"></script>
    <link rel='stylesheet' href='css/bootstrap.min.css' type='text/css' media='all'>
</head>
<body>
    <?php
        include "dbConfig.php";
        include "content.php";
        $userName = $_SESSION['username'];
        $noteTitleArr = array();
        $noteContentArr = array();
        $noteDateArr = array();
        $noteIdArr = array();
        $cnt = 0;
        if($userName != "admin"){
            $query = "SELECT * FROM notes_".$userName;
            $us = mysqli_query($dbcnx, $query);
            if($us)
            {
                while($notes = mysqli_fetch_array($us, MYSQLI_ASSOC))
                {

                    $noteTitleArr[$cnt] = $notes['title'];
                    $noteContentArr[$cnt] = wordwrap($notes['content'], 40, "\n",1);
                    $noteDateArr[$cnt] = $notes['date'];
                    $noteIdArr[$cnt] = $notes['note_id'];
                   // echo "<script type='text/javascript'> alert(".$noteContentArr[$cnt].")</script>";
                    $cnt++;
                }
                $_SESSION['noteTitleArr'] = $noteTitleArr;
                $_SESSION['noteContentArr'] = $noteContentArr;
                $_SESSION['noteDateArr'] = $noteDateArr;
                $_SESSION['noteIdArr'] = $noteIdArr;
                $cnt = 0;
                if(!$_SESSION['check']){
                    $_SESSION['check'] = true;
                    echo "<script type='text/javascript'> window.location.reload()</script>";
                }
            }
            else
            {
              echo "<p><b>Error: ".mysqli_error($dbcnx)."</b></p>";
              exit();
            }
        mysqli_close($dbcnx);
    }
    ?>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="request.php">Show Notes</a></li>
            <li><a href="main.html">Add Note</a></li>
            <li><a href="logOut.php">Log Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
    <div class="row">
    <div class="col-xs-12 col-sm-12">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1 id="title">
                <?php
                    if($noteTitleArr[$cnt])echo $noteTitleArr[$cnt];
                    else echo"Hello ".$userName;
                ?></h1>
            <p id="content">
                <?php
                   if($noteContentArr[$cnt])echo $noteContentArr[$cnt];
                    else echo "You have no notes yet";
                ?></p>
          </div>
        <div class="row">
            <?php
                while($noteTitleArr[$cnt]){
                    echo "<div id='container".$noteIdArr[$cnt]."' class='col-xs-6 col-lg-6'><h2 id='title".$noteIdArr[$cnt]."'>".$noteTitleArr[$cnt]."</h2><p id='content".$noteIdArr[$cnt]."' hidden>".$noteContentArr[$cnt]."</p><p>".$noteShortContentArr[$cnt]."</p><div class='row'><p class='col-md-4'><a class='btn btn-default' href='javascript:open(".$noteIdArr[$cnt].")' role='button'>View details »</a></p><p class='col-md-4'><a class='btn btn-default' href='javascript:deleteNote(".$noteIdArr[$cnt].")' role='button'>Delete Note</a></p></div></div>";
                    $cnt++;
                }
            ?>
          </div>
        </div>
        </div>
    </div>
</body>
</html>
