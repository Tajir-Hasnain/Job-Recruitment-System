<?php
session_start();
require_once("../../includes/functions.php");
if(isset($_SESSION["cid"]))
{
	include("../../includes/companyheader.php");
?>
<div>
	<table  class="table table-striped table-bordered"  id="example">
			<thead>
				<tr>
					<th>Post name</th>
					<th>Number of Vaccancies</th>
					<th>Date of Post</th>
					<th>Expiration Date</th>
					<th>Details</th>
					<th>Availability</th>
				</tr>
			</thead>
			<tbody>
<?php
		
				$connection=connectDb();
				$cid=$_SESSION['cid'];
				$query="SELECT * FROM comjob where cid='$cid'";
				$result=runQuery($connection, $query);
				while($row=mysqli_fetch_assoc($result))
				{	$url = "../../includes/alter.php?jobid=".$row['jobid'];
?>
					<tr>
							<td><?php echo $row['postname']?></td>
							<td><?php echo ($row['slot'] - $row['applied']) ?></td>
							<td><?php echo $row['postdate']?></td>
							<td><?php echo $row['expdate']?></td>
							<td><a href="jobdetails.php?jobid=<?php echo $row['jobid']?>">View Details</a></td>
		<?php   echo 		'<td style="cursor:pointer" onclick=location.href="'.$url.'">';
							if ($row['display']=="1")
							{
								echo "showed <b style='color:red;'>(click to alter)</b>";
							}
							else
							{
								echo "hidden <b style='color:red;'>(click to alter)</b>";
							}
							
								
							?></td>
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
else {
	redto("../../index.php");
}
?>