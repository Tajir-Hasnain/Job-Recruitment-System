<?php
session_start();
require_once("../../includes/functions.php");
if(isset($_SESSION["sid"]))
{
	include("../../includes/stdheader.php");
?>