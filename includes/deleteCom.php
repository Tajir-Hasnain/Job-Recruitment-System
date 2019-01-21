<?php
session_start();
require_once("functions.php");
$con=connectDb();

    echo "Please Wait...";
   
    $id=$_GET['cid'];
   
    $sql = "DELETE FROM company WHERE cid = '$id'";
    runquery($con, $sql);
   
    $sql = "DELETE FROM comjob WHERE cid = '$id'";
    runquery($con, $sql);
   
    $sql = "DELETE FROM application WHERE cid = '$id'";
    runquery($con, $sql);
   
    redto("../public/admin/manageCom.php");
?>
