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
					<th>Company Name</th>
					<th>Email</th>
					<th>Company ID</th>
					<th>Username</th>
					<th>Password</th>
					<th>Company Description</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
<?php
		
				$connection=connectDb();
				$adminid=$_SESSION['adminid'];
				$sql="SELECT * FROM company";
				$result=runQuery($connection, $sql);
				while($info=mysqli_fetch_assoc($result))
				{	$url = "../../includes/deleteCom.php?cid=".$info['cid'];
?>
					<tr>
							<td><?php echo $info['companyname']?></td>
							<td><?php echo $info['email']?></td>
							<td><?php echo $info['cid']?></td>
							<td><?php echo $info['username']?></td>
							<td><?php echo $info['password']?></td>
							<td><?php echo $info['companydescription']?></td>
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