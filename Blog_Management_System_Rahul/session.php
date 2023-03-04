<?php
session_start();
if($_SESSION['logins']==null || $_SESSION['logins']=='')
{
	header("Location:logout.php");
}
?>