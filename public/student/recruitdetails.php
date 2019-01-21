<?php
session_start();
require_once("../../includes/functions.php");
$sid = $_SESSION['sid'];
$connection=connectDb();
$query="select * from student where sid='$sid'";
$result=mysqli_query($connection, $query);
$row=mysqli_fetch_assoc($result);
$email = $row['email'];
require_once("../../includes/stdheader.php");
require_once("../../includes/stdinfo.php");
?>
				</div>
			</div>
		</div>			
	</body>
</html>