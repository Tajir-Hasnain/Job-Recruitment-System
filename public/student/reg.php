<?php
session_start();
require_once("../../includes/functions.php");
if(!isset($_SESSION["adminid"]) && !isset($_SESSION["sid"]) && !isset($_SESSION["cid"]))
{
	if(!empty($_POST["stdregadd"]))
	{
?>
	<!DOCTYPE html>
		<head>
			<title>Campus Recruitement System-Enlist Record</title>
		</head>
			<body>
<?php
					
					$c = 0;
					$java = 0;
					$python = 0;
					$golang = 0;
					$php = 0;
					$android = 0;
					$webdev = 0;
					$servermanagement = 0;
					$ai = 0;
					$sysadmin = 0;

					$langs = $_POST['langs'];
					$devs = $_POST['devs'];

					foreach($langs as $language) {
						if($language == "c++")
							$c = 1;
						if($language == "java")
							$java = 1;
						if($language == "python")
							$python = 1;
						if($language == "golang")
							$golang = 1;
						if($language == "php")
							$php = 1;
					}

					foreach($devs as $d) {
						if($d == "android")
							$android = 1;
						if($d == "webdev")
							$webdev = 1;
						if($d == "servermanagement")
							$servermanagement = 1;
						if($d == "ai")
							$ai = 1;
						if($d == "sysadmin")
							$sysadmin = 1;
					}
					
					$connection=connectDb();
					
					$stdfname=mysqli_real_escape_string($connection, $_POST['stdfname']);
					$stdlname=mysqli_real_escape_string($connection, $_POST['stdlname']);
					$stdroll=mysqli_real_escape_string($connection, $_POST['stdroll']);
					$stduname=mysqli_real_escape_string($connection, $_POST['stduname']);
					$stdpword=mysqli_real_escape_string($connection, $_POST['stdpword']);
					$uniname=mysqli_real_escape_string($connection, $_POST['uniname']);
					$fathername=mysqli_real_escape_string($connection, $_POST['fathername']);
					$mothername=mysqli_real_escape_string($connection, $_POST['mothername']);
					$dateofbirth=mysqli_real_escape_string($connection, $_POST['dateofbirth']);
					$gender=mysqli_real_escape_string($connection, $_POST['gender']);
					$address=mysqli_real_escape_string($connection, $_POST['address']);
					$mobileno=mysqli_real_escape_string($connection, $_POST['mobile']);
					$emailid=mysqli_real_escape_string($connection, $_POST['email']);
					$depertment=mysqli_real_escape_string($connection, $_POST['depertment']);
					$level=mysqli_real_escape_string($connection, $_POST['level']);
					$res=mysqli_real_escape_string($connection, $_POST['result']);
					$query="insert into student(firstname, lastname, roll, university, email, result, username, password, fathername, mothername, gender, dob, address, number, depertment, level , c , java, python , golang , php , android , webdev , servermanagement , ai , sysadmin) values('$stdfname', '$stdlname', '$stdroll' , '$uniname','$emailid','$res', '$stduname', '$stdpword', '$fathername', '$mothername', '$gender','$dateofbirth','$address','$mobileno','$depertment','$level' ,'$c' , '$java' , '$python' , '$golang' , '$php' , '$android' , '$webdev' , '$servermanagement' , '$ai' , '$sysadmin')";
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
		echo "stdaddreg not pressed";
	}
}
else
{
		echo "you are logged in";
}
	
?>