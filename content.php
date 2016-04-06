<?php
    session_start();
    $noteContentArr = $_SESSION['noteContentArr'];
    $noteShortContentArr = array();
    $cnt = 0;
    foreach($noteContentArr as $value){
        if(strlen($value) > 213){
            $tmp = substr($value,0,210)."...";
            $noteShortContentArr[$cnt++] = $tmp;
        }
        else {
            $noteShortContentArr[$cnt++] = $value;
        }
    }
?>
