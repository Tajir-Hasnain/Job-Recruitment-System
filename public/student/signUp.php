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
				<h3>Student Registration</h3>
			<div></br>
					
				<form  action="reg.php" method="post">
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">First Name:</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="stdfname" name = "stdfname" placeholder="First Name" required>
								</div>
						</div>
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Last Name:</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="stdlname" name = "stdlname" placeholder="Last Name" required>
								</div>
						</div>
					</div></br>
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">ID No:</label>
								<div class="col-sm-10">
							    	<input type="number" class="form-control" id="stdfname" name = "stdroll" placeholder="1604XXX" required>
								</div>
						</div>
					</div></br>	
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Username:</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="stduname" name = "stduname" placeholder="Enter Username" required>
								</div>
						</div>
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Password:</label>
								<div class="col-sm-10">
							    	<input type="password" class="form-control" id="stdpword" name = "stdpword" placeholder="Enter Password" required>
								</div>
						</div>
					</div></br>	

					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">University:</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="uniname" name = "uniname" placeholder="CUET" required>
								</div>
						</div>
					</div></br>	

					<div class = "row">
					<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Father's Name:</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="stdfname" name = "fathername" placeholder="Father's Name" required>
								</div>
						</div>
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Mother's Name:</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="stdlname" name = "mothername" placeholder="Mother's Name" required>
								</div>
						</div>
					</div></br>
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Gender:</label>
								<div class="col-xs-10">
							    	<select class="control-label" name="gender" required>
										<option class="control-label" selected="selected" disabled="disabled">Gender</option>
										<option class="control-label" value="male">male</option>
										<option class="control-label" value="female">female</option>
									</select>
								</div>
						</div>
					</div></br>	
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-10" for="">Date of Birth:</label>
								<div class="col-sm-10">
							    	<input type="date" class="form-control" id="dateofbirth" name = "dateofbirth" placeholder="mm/dd//yy" required>
								</div>
						</div>
					</div></br>	
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Adress:</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="address" name = "address" placeholder="Address">
								</div>
						</div>
					</div></br>	
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Contact No:</label>
								<div class="col-sm-10">
							    	<input type="number" class="form-control" id="mobile" name = "mobile" placeholder="Contact No." required>
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
							<label class="control-label col-xs-4" for="">Department:</label>
								<div class="col-sm-10">
							    	<select class="mdb-select md-form colorful-select dropdown-primary" name="depertment" required>
										<option class="control-label" selected="selected" disabled='disabled'>Choose a Depertment</option>
										<option class="control-label" value="CIVIL">CIVIL</option>
										<option class="control-label" value="EEE">EEE</option>
										<option class="control-label" value="ME">ME</option>
										<option class="control-label" value="CSE">CSE</option>
										<option class="control-label" value="PME">PME</option>
										<option class="control-label" value="ETE">ETE</option>
										<option class="control-label" value="URP">URP</option>
										<option class="control-label" value="ARCHITECTURE">ARCHITECTURE</option>
									</select>
								</div>
						</div>
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Level:</label>
								<div class="col-sm-10">
							    	<select class="control-label" name="level" required>
										<option class="control-label" selected="selected" disabled='disabled'>Choose a Level</option>
										<option class="control-label" value=1>Level-1</option>
										<option class="control-label" value=2>Level-2</option>
										<option class="control-label" value=3>Level-3</option>
										<option class="control-label" value=4>Level-4</option>
										<option class="control-label" value=5>Level-5 (ARCHITECTURE ONLY)</option>
									</select>
								</div>
						</div>
					</div></br>	
					<div class = "row">
						<div class="col-xs-4">
							<label class="control-label col-xs-4" for="">Result:</label>
								<div class="col-sm-10">
							    	<input type="text" class="form-control" id="result" name = "result" placeholder="Enter CGPA" required>
								</div>
						</div>
					</div></br>
					<label class = "control-label col-xs-4" for="">Skills</label>
					<div class = "row">
						<div class = "col-xs-4">
							<label class = "control-label col-xs-4" for="">Programming</label>
							<div class = "col-sm-10">
								<select class="control-label" name = "langs[]" multiple="multiple">
										<option class="control-label" selected="selected" disabled='disabled'>Which Programming languages are you skilled at?</option>
										<option class="control-label" value="c++">C++</option>
										<option class="control-label" value="java">Java</option>
										<option class="control-label" value="python">Python</option>
										<option class="control-label" value="golang">GoLang</option>
										<option class="control-label" value="php">PHP</option>
									</select>
							</div>
						</div>
						<div class = "col-xs-4">
							<label class = "control-label col-xs-4" for="">Development</label>
							<div class = "col-sm-10">
								<select class="control-label" name="devs[]" multiple="multiple">
										<option class="control-label" selected="selected" disabled='disabled'>Development Experiences</option>
										<option class="control-label" value="android">Android</option>
										<option class="control-label" value="webdev">Web Development</option>
										<option class="control-label" value="servermanagement">Server Management</option>
										<option class="control-label" value="ai">Artificial Intelligence</option>
										<option class="control-label" value="sysadmin">System Admin</option>
									</select>
							</div>
						</div>
					</div></br>
					<button class="btn"  type="submit" name="stdregadd" value="Submit">Sign Up</button>
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