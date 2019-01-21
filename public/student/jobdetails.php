<?php
session_start();
if(isset($_SESSION['sid'])) {
	require_once("../../includes/functions.php");
	$jobid = $_GET['jobid'];
	$connection=connectDb();
	$query="select jobdes,requirements from comjob where jobid='$jobid'";
	$result=mysqli_query($connection, $query);
	$row=mysqli_fetch_assoc($result);
	$des = $row['jobdes'];
	$req = $row['requirements'];
	$url = "../../includes/apply.php?jobid=".$jobid;
	require_once("../../includes/stdheader.php");
?>
	<div class = "container">
		<h2>Job Description : </h2><br>
		<p><?php echo $des;?></p><br><br>

		<h2>Requirements to Apply : </h2><br>
		<p><?php echo $req; ?></p>
	</div>
	<button style = "margin-left: 800px; width: 300px; margin-top : 60px;"class='btn btn-success btn-secondary btn-lg' name = "apply" onclick=location.href="<?php echo $url;?>" style>Apply</button>
</body>
</html>

<?php
}
else {
	redto("../../index.php");
}
?>