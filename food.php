<?php
	session_start();
	if(!$_SESSION['log'])
		header("location:login.php");
?>
<html>
	<head>
		<style type="text/css">
			#d1
			{
				width:800px;
				height:600px;
				background:url("food.jpg");
			}
		</style>
	</head>
<?php
	if($_SERVER['REQUEST_METHOD']=='POST')
	{	
		$un=$_SESSION['log'];
		$fd=$_POST['f'];
		$con=mysqli_connect("localhost","root","","hotel");
		$r="insert into food values('$un','$fd')";
		mysqli_query($con,$r);
		header("location:after_user_login_homeo.php");
		exit();	
	}
?>
	<body >
		<center><h2 style="font-size: 34px;">Get the Tasty Food </h2></h2>
			 <a href="after_user_login_homeo.php">  <input style="background-color: red;margin-left:1280px;height:30px;" type="button" value="back"></a>
			<div id="d1">
				<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
					<input style="margin-top: 280px;width:200px;height: 60px;margin-left: -280px;" type="text" placeholder="food_items" name="f" pattern="[A-Z a-z][0-9]+{4,40}" title="enter item name and numbers of items " required><br><br>
					<input style="width:200px;height: 35px;margin-left: -280px;" type="submit" value="order">
				</form>
			</div>
	</body>
</html>