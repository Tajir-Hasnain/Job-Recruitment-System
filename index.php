<!--LoC : 1,665-->
<!--

1. Students create account
2. Student edit personal and educational info
3. Company create account
4. Company edit personal info (location, about, name of company, ceo, company website link etc)
5. Company can post a job advertisement
6. Company can edit posted job advertisement and control the view to students
7. Student can search for job
8. Student have an apply button to apply for job
9. Company can see who applied for job10. Company has a button to see a particular students necessary info
11. Company have another button to send email to that student


-->
<?php
session_start();
require_once("./includes/functions.php");
if(isset($_SESSION["adminid"])||isset($_SESSION["sid"])||isset($_SESSION["cid"]))
{
	if(isset($_SESSION["adminid"]))
	{
		redto("public/admin/adminHome.php");
	}
	else if(isset($_SESSION["sid"]))
	{
		redto("public/student/stdhome.php");
	}
	else if(isset($_SESSION["cid"]))
	{
		redto("public/company/companyHome.php");
	}
}
//admin login
else
{
	$connection=connectDb();
	if (isset($_POST["admin-submit"])) 
	{
		$username=mysqli_real_escape_string($connection, $_POST["admin-username"]); 
		$password=mysqli_real_escape_string($connection, $_POST["admin-password"]); 
		$sql="select adminid,password from urs.admin where binary username='$username'";
		$query=runQuery($connection, $sql);
		$info=mysqli_fetch_assoc($query);
		if($query)
			mysqli_free_result($query);
		mysqli_close($connection);
		if ($info!=0)
		{
			$pass=$info['password'];
			if ($password==$pass)
			{
				$adminid=$info['adminid'];
				$_SESSION["adminid"]=$adminid;
				redto("public/admin/adminHome.php");
			}
			else
			{
				$_SESSION["login_error"]="Password mismatch";
			}
			
		}
		else
		{
			$_SESSION["login_error"]="Username does not exists";
		}
	}
//students login
	else if (isset($_POST["student-submit"]))
	{
		$username=mysqli_real_escape_string($connection, $_POST["student-username"]); 
		$password=mysqli_real_escape_string($connection, $_POST["student-password"]); 
		$query="select sid,password from urs.student where binary username='$username'";
		$result=runQuery($connection, $query);
		$info=mysqli_fetch_assoc($result);
		if($result)
			mysqli_free_result($result);
		mysqli_close($connection);
		if ($info!=0)
		{
			$pass=$info['password'];
			if ($password==$pass)
			{
				$sid=$info['sid'];
				$_SESSION["sid"]=$sid;
				redto("public/student/stdhome.php");
			}
			else
			{
				$_SESSION["login_error"]="Password mismatch";
			}
			
		}
		else
		{
			$_SESSION["login_error"]="Username does not exists";
		}

	}
//company login
	else if (isset($_POST["company-submit"]))
	{
		$username=mysqli_real_escape_string($connection, $_POST["company-username"]);
		$password=mysqli_real_escape_string($connection, $_POST["company-password"]);
		$query="select cid,password from urs.company where binary username='$username'";
		$result=runQuery($connection, $query);
		$info=mysqli_fetch_assoc($result);
		if($result)
			mysqli_free_result($result);
		mysqli_close($connection);
		if ($info!=0)
		{
			$pass=$info['password'];
			if ($password==$pass)
			{
				$cid=$info['cid'];
				$_SESSION["cid"]=$cid;
				redto("public/company/companyHome.php");
			}
			else
			{
				$_SESSION["login_error"]="Password mismatch";
			}
			
		}
		else
		{
			$_SESSION["login_error"]="Username does not exists";
		}

	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome-Job Recruitement System</title>
	<meta name = "viewport" content="width=device-width, initial-scale=1">
						<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

							<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

								<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

							<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="./public/stylesheet.css">
	<script type="text/javascript">
		$(document).ready(function() {
			$('#student-login-form').hide();
			$('#company-login-form').hide();
			$('#student-login-tag').click(function() {
				$('#admin-login-form').fadeOut();
				$('#company-login-form').fadeOut();
				$('#student-login-form').show();
			});
			$('#admin-login-tag').click(function() {
				$('#student-login-form').fadeOut();
				$('#company-login-form').fadeOut();
				$('#admin-login-form').show();
			});
			$('#company-login-tag').click(function() {
				$('#admin-login-form').fadeOut();
				$('#student-login-form').fadeOut();
				$('#company-login-form').show();
			});
		});
	</script>
	<!--
    <script type="text/javascript">
    	function clickFunction(s) {
    		var admin = document.getElementById("admin-login-form");
    		var student = document.getElementById("student-login-form");
    		var company = document.getElementById("company-login-form");
    		if(s == "admin") {
    			admin.style.display = "block";
    			student.style.display = "none";
    			company.style.display = "none";
    		}
    		if(s == "student") {
    			student.style.display = "block";
    			admin.style.display = "none";
    			company.style.display = "none";
    		}
    		if(s == "company") {
    			company.style.display = "block";
    			student.style.display = "none";
    			admin.style.display = "none";
    		}
    	}
    </script>-->
    <style>
    	.error
    	{
    		position: absolute;
			z-index: 15;
			width : 45%;
			top: 100%;
			left: 45%;
			margin: -100px 0 0 -150px;
    	}

    </style>
</head>
<body class = "container"  >
												<!--Navigation Bar-->
	
	<nav class="navbar navbar-expand-sm bg-light">
		<h1 style="cursor:pointer" onclick=location.href="index.php">Job Recruitement System </h1>
		<hr>
	</nav>
	
												<!--Login Header-->
	<div style="margin-top:10%;">
		<?php
			if(isset($_SESSION["signUp"])) {
				echo "<h2 style='color:red;font-size:15px;'>Sign Up Successful.Please Login with your username and password</h2>";
				unset($_SESSION["signUp"]);
			}
		?>
	</div>
	<div class = "row" id = "login-header">
		<div class = "col-*-*" id="admin-login-tag" onclick="clickFunction('admin')">Admin Login</div>
		<div class="col-*-*" id="student-login-tag" onclick="clickFunction('student')">Student Login</div>
		<div class="col-*-*" id="company-login-tag" onclick="clickFunction('company')">Company Login</div>
	</div>
												<!--Login Forms-->
	<div class = "login-form">
		
		<!--admin-->

		<form class="form-horizontal" action="#" method="post" id = "admin-login-form">
	  		<div class="form-group">
	    		<label class="control-label col-sm-2" for="username">Admin&nbspUsername:</label>
	    		<div class="col-sm-10">
	      			<input type="text" class="form-control" id="admin-username" placeholder="Enter Username" name = "admin-username">
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label class="control-label col-sm-2" for="pwd">Password:</label>
	    		<div class="col-sm-10"> 
	      			<input type="password" class="form-control" id="admin-password" placeholder="Enter password" name = "admin-password">
	    		</div>
	  		</div>
	  		<div class="form-group"> 
	    		<div class="col-sm-offset-2 col-sm-10">
	      			<button type="submit" class="btn btn-default" name = "admin-submit">Submit</button>
	    		</div>
	  		</div>
		</form>

		<!--student-->


		<form class="form-horizontal" action="#" method="post" id = "student-login-form">
	  		<div class="form-group">
	    		<label class="control-label col-sm-2" for="username">Student&nbspUsername:</label>
	    		<div class="col-sm-10">
	      			<input type="text" class="form-control" id="student-username" placeholder="Enter Username" name = "student-username">
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label class="control-label col-sm-2" for="pwd">Password:</label>
	    		<div class="col-sm-10"> 
	      			<input type="password" class="form-control" id="student-password" placeholder="Enter password" name = "student-password">
	    		</div>
	  		</div>
	 		 <div class="form-group"> 
	    		<div class="col-sm-offset-2 col-sm-10">
	      			<div class="checkbox">
	      			</div>
	    		</div>
	  		</div>
	  		<div class="form-group"> 
	    		<div class="col-sm-offset-2 col-sm-10">
	      			<button type="submit" class="btn btn-default" name = "student-submit">Submit</button>
	    		</div>
	  		</div>
		</form>


		<!--company-->


		<form class="form-horizontal" action="#" method="post" id = "company-login-form">
	  		<div class="form-group">
	    		<label class="control-label col-sm-2" for="username">Company&nbspUsername:</label>
	    		<div class="col-sm-10">
	      			<input type="text" class="form-control" id="comapany-username" placeholder="Enter Username" name = "company-username">
	    		</div>
	  		</div>
	  		<div class="form-group">
	    		<label class="control-label col-sm-2" for="pwd">Password:</label>
	    		<div class="col-sm-10"> 
	      			<input type="password" class="form-control" id="company-password" placeholder="Enter password" name = "company-password">
	    		</div>
	  		</div>
	 		 <div class="form-group"> 
	    		<div class="col-sm-offset-2 col-sm-10">
	      			<div class="checkbox">
	      			</div>
	    		</div>
	  		</div>
	  		<div class="form-group"> 
	    		<div class="col-sm-offset-2 col-sm-10">
	      			<button type="submit" class="btn btn-default" name = "company-submit">Submit</button>
	    		</div>
	  		</div>
		</form>

	</div>
	<span class = "error">
		<?php
			if(isset($_SESSION["login_error"])) {
				echo $_SESSION["login_error"];
				unset($_SESSION["login_error"]);
			}
		?>
		<h3 style = "font-size:18px;">Not registered yet? <a href="./public/checkWhat.php">Sign Up here</a></h3>
	</span>
</body>
</html>