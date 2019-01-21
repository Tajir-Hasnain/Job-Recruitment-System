<?php
session_start();
require_once("../../includes/functions.php");
if(!isset($_SESSION["adminid"]) && !isset($_SESSION["sid"]) && !isset($_SESSION["cid"]))
{
?>
<!DOCTYPE html>
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
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
	    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
	    <link rel="stylesheet" href="../stylesheet.css">
</head>
<body>
								
								<!--Navigation-->

	<nav class="navbar navbar-expand-sm bg-light">
		<h1 style="cursor:pointer" onclick=location.href="../../index.php">Job Recruitement System </h1>
		<hr>
	</nav><br>

			<hr>
			<div>
				<h3>Company Registration</h3>
			<div></br>
					
				<form  action="reg.php" method="post">
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-5" for="">Company Name:</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="comname" name = "comname" placeholder="Company Name" required>
								</div>
						</div>
					</div></br>
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Username:</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="comuname" name = "comuname" placeholder="Enter Username" required>
								</div>
						</div>
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Password:</label>
								<div class="col-sm-10">
							    	<input type="password" class="form-control" id="compword" name = "compword" placeholder="Enter Password" required>
								</div>
						</div>
					</div></br>
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Email:</label>
								<div class="col-sm-10">
							    	<input type="email" class="form-control" id="email" name = "email" placeholder="Enter email" required>
								</div>
						</div>
					</div></br>	
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-10" for="">Company Description:</label>
								<div class="col-sm-10">
							    	<textarea class="form form-control"  rows="10" cols="50" name="comdes" placeholder="ex: description" value=""  required></textarea><br/>
								</div>
						</div>
					</div></br>	
					
					<button class="btn" type="submit" name="comregadd" value="Submit">Sign Up</button>
				</form>

			</div>
	</body>
</html>
<?php
	require_once("../../includes/footerstd.php");
}
else
{
		echo "you are logged in";
}
	
?>