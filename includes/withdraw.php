<?php
session_start();
if(!isset($_SESSION["sid"])) {
    redto("../../index.php");
}
require_once("functions.php");
$connection=connectDb();

        $jobid=$_GET['jobid'];
        $sid=$_SESSION['sid'];
        $query = "DELETE FROM application WHERE jobid = '$jobid' AND sid = $sid;";
        mysqli_query($connection, $query);

        $query = "select applied from comjob where jobid='$jobid'";
        $result = mysqli_query($connection, $query);

        $row = mysqli_fetch_assoc($result);

        $applied = $row['applied'];

        $applied = $applied-1;

        $query = "update comjob set applied = '$applied' where jobid = '$jobid'";
        mysqli_query($connection, $query);

        redto("../public/student/applications.php");
?>
