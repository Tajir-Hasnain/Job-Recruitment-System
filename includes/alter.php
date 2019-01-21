<?php
session_start();
require_once("functions.php");
$connection=connectDb();

    echo "Please Wait...";
        $cid=$_GET['jobid'];
        $query="SELECT display FROM `comjob` WHERE jobid=$cid";
		$result=runQuery($connection, $query);
		$row=mysqli_fetch_assoc($result);
		if ($row['display']=='1')
			$val='0';
		else
			$val='1';
        $query = "UPDATE comjob SET display = '$val' WHERE comjob.jobid = '$cid'; ";
        mysqli_query($connection, $query);
        redto("../public/company/companyads.php");
?>
