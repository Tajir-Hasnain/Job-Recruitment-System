<?php
session_start();
require_once("../../includes/functions.php");
if(isset($_SESSION["cid"]))
{
	$connection=connectDb();
	$_SESSION["success"]="";
	if (isset($_POST["submit"])) 
	{
		$cid=$_SESSION["cid"];
		$name=mysqli_real_escape_string($connection, $_POST["name"]); 
		$vaccancy=mysqli_real_escape_string($connection, $_POST["vaccancy"]);
		$postdate=date('Y-m-d'); 
		$lastdate=mysqli_real_escape_string($connection, $_POST["lastdate"]); 
		$description=mysqli_real_escape_string($connection, $_POST["description"]);
		$requirements=mysqli_real_escape_string($connection,$_POST['requirements']);
		$query="INSERT INTO comjob (cid, postname, slot,postdate,expdate,jobdes,requirements,display) VALUES ('$cid', '$name', '$vaccancy','$postdate','$lastdate','$description','$requirements','1');";
		runQuery($connection, $query);
		unset($_POST["submit"]);
		mysqli_close($connection);
		$_SESSION["success"]="2";
	}
	include("../../includes/companyheader.php");
?>
		
		<div align="center" class="text-info col-md-8">

<?php

			if ($_SESSION["success"]=="2")
			{
				$_SESSION["success"]=="0"
?>
				<div class="text alert alert-success">Successfully Posted New Advertisement</div>
<?php
			}
			

?>

			<form action="#" method="post" style="float:right;margin-right:50px;margin-top:-50px;">
				Job Post : <input type="text" name="name" required><br><br>
				Vaccancies :&nbsp<input  type="number" name="vaccancy" required><br><br>
				Expire Date : <input  type="Date" name="lastdate" required><br><br>
				Job Description : <textarea  type="text" name="description" required></textarea><br><br>
				Requirements : <textarea type="text" name="requirements" required></textarea><br><br>
				<button  type="submit" name="submit" value="submit">Submit </button>
			</form>
		</div>
<?php
	require_once("../../includes/footerstd.php");
}
else
{
	redto("../../index.php");
}
?>