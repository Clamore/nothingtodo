<?php
session_start();

require("inc/connect.php");
error_reporting(~E_NOTICE);
 
$user = $_POST["username"];
$pass = $_POST["password"];

$sql = "SELECT * FROM tbuser WHERE username = '$user' AND password = '$pass' ";
$query = mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($query);

if ($rowcount > 0)
{
	$_SESSION["user"] = $user;
	echo "<script>window.location='admin.php';</script>"; 
}
else
{
	echo "<script>alert('ชชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');window.history.back();</script>";
}
?>