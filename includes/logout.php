<?php
session_start();
if(!isset($_SESSION["adminid"])&&!isset($_SESSION["sid"])&&!isset($_SESSION["cid"])) {
	require_once("../includes/functions.php");
	redto("../index.php");
}
else {
	require_once("../includes/functions.php");
    session_destroy();
    redto("../index.php");
}
?>