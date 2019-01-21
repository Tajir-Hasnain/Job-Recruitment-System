<?php
session_start();
require_once("../../includes/functions.php");
if(isset($_SESSION["sid"]))
{
	include("../../includes/stdheader.php");
?>

<?php

			if (isset($_SESSION["success"])) {
				unset($_SESSION["success"]);
			
?>
				<div class="text alert alert-success">Successfully Posted New Advertisement</div>
<?php
			}
			

?>
	<div class="col-md-8">
			<table class="table table-striped" border="1" id="example" >
				<thead>
					<tr>
						<th>Company name</th>
						<th>Post name</th>
						<th>Number of Vaccancies</th>
						<th>Date of Job Posted</th>
						<th>Expiration Date</th>
						<th>Withdraw</th>
					</tr>
				</thead>
				<tbody>
<?php
			
					$connection=connectDb();
					$sid=$_SESSION['sid'];
					$query="SELECT jobid FROM application where sid='$sid'";
					$result=runQuery($connection, $query);
					while($info=mysqli_fetch_assoc($result))
					{	
						$url = "../../includes/withdraw.php?jobid=".$info['jobid'];
						$jobid=$info['jobid'];
						$query2="SELECT * from comjob where jobid='$jobid'";
						$result2=runQuery($connection, $query2);
						$info2=mysqli_fetch_assoc($result2);
						$query3="SELECT companyname from company where cid='$info2[cid]'";
						$result3=runQuery($connection, $query3);
						$info3=mysqli_fetch_assoc($result3);
?>
						<tr>
							<td><?php echo $info3['companyname']?></td>
							<td><?php echo $info2['postname']?></td>
							<td><?php echo $info2['vaccantpost']?></td>
							<td><?php echo $info2['postdate']?></td>
							<td><?php echo $info2['expdate']?></td>
							<td>
								<button class='btn btn-danger' name = "apply" onclick=location.href="<?php echo $url?>">Withdraw</button>
							</td>
						</tr>
<?php
					}
					freenclose($result,$connection);
				
?>
				</tbody>
			</table>
    
				</div>
<?php
	require_once("../../includes/footerstd.php");
}
else
{
	redto("../../index.php");
}
?>