<?php
session_start();
require_once("../../includes/functions.php");
if(isset($_SESSION['adminid'])) {
	require_once("../../includes/adminHeader.php");
?>
<div>
	<table  class="table table-striped table-bordered"  id="example">
			<thead>
					<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Student Id</th>
						<th>Username</th>
						<th>Password</th>
						<th>Delete</th>
					</tr>
				</thead>
			<tbody>
<?php
		
				$connection=connectDb();
				$adminid=$_SESSION['adminid'];
				$sql="select * from student";
				$result=runQuery($connection, $sql);
				while($info=mysqli_fetch_assoc($result))
				{	$url = "../../includes/deleteStd.php?sid=".$info['sid'];
?>
					<tr>
							<td><?php echo $info['firstname']?></td>
							<td><?php echo $info['lastname']?></td>
							<td><?php echo $info['sid']?></td>
							<td><?php echo $info['username']?></td>
							<td><?php echo $info['password']?></td>
							<td>
								<button class='btn btn-danger'  onclick=location.href="<?php echo $url?>">Delete</button>
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
else {
	redto("../../index.php");
}

?>