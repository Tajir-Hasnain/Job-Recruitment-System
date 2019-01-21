<?php
session_start();
require_once("../../includes/functions.php");
if(isset($_SESSION["cid"]))
{
	include("../../includes/companyheader.php");
?>
	<div>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Post name</th>
					<th>Student First Name</th>
					<th>Student Last Name</th>
					<th>Student Information</th>
				</tr>
			</thead>
			<tbody>
<?php
		
				$connection=connectDb();
				$cid=$_SESSION['cid'];
				$query="SELECT * FROM application where cid='$cid'";
				$result=runQuery($connection, $query);
				while($row=mysqli_fetch_assoc($result))
				{
					$jobid=$row['jobid'];
					$sid=$row['sid'];
					$query2="SELECT postname from comjob where jobid='$jobid'";
					$result2=runQuery($connection, $query2);
					$row2=mysqli_fetch_assoc($result2);
					$query3="SELECT firstname,lastname from student where sid='$sid'";
					$result3=runQuery($connection, $query3);
					$row3=mysqli_fetch_assoc($result3);
?>
					<tr>
						<td><?php echo $row2['postname']?></td>
						<td><?php echo $row3['firstname']?></td>
						<td><?php echo $row3['lastname']?></td>
						<td>
							<a href="recruitdetails.php?sid=<?php echo $sid; ?>">View Curriculam Vitae</a>
						</td>
					</tr>
<?php
				}
			
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