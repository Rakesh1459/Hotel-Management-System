<?php
session_start();
if(!$_SESSION['log'])
	header("location:login.php");
?>
<html>
	<body background="slider5.jpg" style="background-repeat:no-repeat;background-size:cover;height:735px;">
			<h1 style="color:black;font-size: 35px;"><center>Room Allotment </center></h1><br><br>
			<a href="after_user_login_homeo.php">  <input style="background-color: red;margin-left:1280px;height:30px;" type="button" value="back"></a>  
			<form action="" method="post">
			<label style="margin-left:445px;font-size: 23px;margin-top:100px;color:white;">Username</label>
				<center><input style="background-color:green;color:white;width: 220px;height:35px;font-size: 17px;margin-top:-40px;" type="text" name="un" placeholder="username" required><br>
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
			$rooms=$val['rooms'];
			echo "<center> <p style='font-size:20px;'>your rooms are :  ";echo $rooms;echo "</p></center>";
		}
		else
		{
			echo "<center><p style='font-size:20px;'>";echo "invalid username";echo "</p></center>";
		}
	}
?>