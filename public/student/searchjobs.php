<?php
session_start();
require_once("../../includes/functions.php");
if(isset($_SESSION["sid"]))
{
	include("../../includes/stdheader.php");
?>
				<div class="col-md-8">
			<table  class="table table-striped" border="1">
				<thead>
					<tr>
						<th>Company name</th>
						<th>Post name</th>
						<th>Number of Vaccancies</th>
						<th>Date of Post</th>
						<th>Expiration Date</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
	<?php
			
					$connection=connectDb();
					$query="SELECT * FROM comjob WHERE display='1' AND DATE(NOW()) <= expdate and NOT EXISTS(SELECT * FROM application WHERE jobid = comjob.jobid AND applied < slot AND sid = '".$_SESSION['sid']."')";
					$result=runQuery($connection, $query);
					while($info=mysqli_fetch_assoc($result))
					{
							$query2="SELECT companyname from company where cid='$info[cid]'";
							$result2=runQuery($connection, $query2);
							$info2=mysqli_fetch_assoc($result2);
							$url = "../../includes/apply.php?jobid=".$info['jobid'];
	?>
						<tr>
							<td><?php echo $info2['companyname']?></td>
							<td><?php echo $info['postname']?></td>
							<td><?php echo $info['vaccantpost']?></td>
							<td><?php echo $info['postdate']?></td>
							<td><?php echo $info['expdate']?></td>
							<td>
								<button class='btn btn-success' name = "apply" onclick=location.href="<?php echo $url;?>">Apply</button>
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