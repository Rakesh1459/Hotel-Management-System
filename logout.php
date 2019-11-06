<head>
<style>
#me
{
	width:500px;
	height:300px;
	margin:200px 500px;
	font-size:40px;
}
</style>
</head>
<?php
SESSION_START();
echo '<div id="me">';
echo "thank you   :".$_SESSION['log'];
echo "</div>";
session_destroy();
header("location:Home_original.php");
exit();
?>