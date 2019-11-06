<?php
	session_start();
	if(!$_SESSION['log'])
		header("location:login.php");
?>
<html>
	<head>
		<style>
			
		</style>
	</head>
	<body background="home.jpg" style="	background-repeat:no-repeat;background-size:cover;height:735px;position:fixed;">
		<h1 style="margin-left:489;">Keep the Room Clean</h1>
		<a href="after_user_login_homeo.php">  <input style="background-color: red;margin-left:1280px;height:30px;" type="button" value="back"></a>  
		<form action="" method="post">
		<label style="margin-left:445px;font-size: 23px;margin-top:100px;">Username</label>
				<center><input style="background-color:green;color:white;width: 220px;height:35px;font-size: 18px;margin-top:-40px;" type="text" name="un" placeholder="username" required><br><br>
				<label style="margin-left:-328px;px;font-size: 23px;">Rooms</label>
				<center><input style="background-color:green;color:white;width: 220px;height:35px;font-size: 18px;margin-top:-40px;" type="text" name="room" placeholder="room" required><br>
				<br><input style="background-color: green;color:white;font-size: 22px;width: 220px;height:35px;" type="submit" value="submit">
			</center>
	</body>
</html>
<?php
	if(isset($_POST['un']))
	{
		$us=$_POST['un'];
		$con=mysqli_connect("localhost","root","","hotel");
		$s="select * from room where username='$us'";
		$i=mysqli_query($con,$s);
		$val=mysqli_fetch_assoc($i);
		$user=$val['username'];
		echo "<br><br>";
		if($user==$us)
		{
			
			echo "<center> <p style='font-size:20px;'>your rooms are :  ";echo "your request is submitted ";echo "</p></center>";
		}
		else
		{
			echo "<center><p style='font-size:20px;'>";echo "invalid username";echo "</p></center>";
		}
	}
?>