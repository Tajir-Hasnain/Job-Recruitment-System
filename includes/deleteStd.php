<?php
session_start();
require_once("functions.php");
$con=connectDb();

    echo "Please Wait...";
   
    $id=$_GET['sid'];
   
    $sql = "DELETE FROM student WHERE sid = '$id'";
    runquery($con, $sql);
   
    redto("../public/admin/manageStd.php");
?>
