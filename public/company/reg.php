<?php
session_start();
require_once("../../includes/functions.php");
if(!isset($_SESSION["adminid"]) && !isset($_SESSION["sid"]) && !isset($_SESSION["cid"]))
{
	if(!empty($_POST["comregadd"]))
	{
?>
	<!DOCTYPE html>
		<head>
			<title>Campus Recruitement System-Enlist Record</title>
		</head>
			<body>
<?php

					$connection=connectDb();
					$comname=mysqli_real_escape_string($connection, $_POST['comname']);
					$comuname=mysqli_real_escape_string($connection, $_POST['comuname']);
					$compword=mysqli_real_escape_string($connection, $_POST['compword']);
					$email=mysqli_real_escape_string($connection, $_POST['email']);
					$comdes=mysqli_real_escape_string($connection, $_POST['comdes']);
					$query="insert into company(companyname, username, password, email, companydescription) values('$comname', '$comuname', '$compword','$email','$comdes')";
					$result=mysqli_query($connection, $query)
					or die ('Error Querying Database');
					mysqli_close($connection);
					echo "Record has been added successfully";
					$_SESSION["signUp"] = true;
					redto("../../index.php");
?>
				<br/>
				<a href="../../index.php">back to home page</a>
			</body>
</html>
<?php
	}
	else
	{
		echo "comaddreg not pressed";
	}
}
else
{
		echo "you are logged in";
}
	
?>