  <?php
ini_set('display_errors', 1);
error_reporting(~0);

$serverName = "localhost";
$userName = "itsurviv_blog";
$userPassword = "blog2486";
$dbName = "itsurviv_blog";

$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
?>