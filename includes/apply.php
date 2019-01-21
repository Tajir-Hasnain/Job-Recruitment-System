<?php
session_start();
if(!isset($_SESSION["sid"])) {
    redto("../../index.php");
}
require_once("functions.php");
$connection=connectDb();
    
        $id=$_GET['jobid'];
        $sid=$_SESSION['sid'];
        
        $query="select cid from comjob where jobid='$id'";
        $result=mysqli_query($connection, $query);
        
        $row=mysqli_fetch_assoc($result);
        $cid=$row['cid'];
        $query2 = "INSERT INTO application (sid, jobid,cid) VALUES ('$sid', '$id','$cid');";
        mysqli_query($connection, $query2);

        $query = "select applied from comjob where jobid='$id'";
        $result = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($result);

        $applied = $row['applied'];

        $applied = $applied+1;

        $query = "update comjob set applied = '$applied' where jobid = '$id'";
        mysqli_query($connection, $query);

        $_SESSION["success"] = $id;
        redto("../public/student/applications.php");
?>
