
<?php
session_start();
if(!$_SESSION['log'])
	header("location:login.php");
?>
<body background="home.jpg" style="background-repeat:no-repeat;background-size:cover;">
	<h1 style="font-size:38px;"><center>User Page</center></h1><br><br>
	<a href="after_user_login_homeo.php">  <input style="background-color: red;margin-left:1280px;height:30px;" type="button" value="back"></a>   	
	<div id="d1">
	<form action="" method="post">
		<center>
			<label style="font-size:21px;">choose field : </label>
			<select name="ad" style="width:210;height: 35;border-color: black">
				<option value="type">select_type</option>
				<option value="room_allot">check_alloted rooms</option>
				<option value="food">food_orders</option>
				<option value="payment">payment_list</option>
				<option value="feed">check_feedback</option>
				<option value="contact">contacts</option>
			</select><br>
			<br><br><input style="width:210;height: 35;margin-left:120px; background-color:green;color:white;font-size:21px;" name="submit1" type="submit" value="submit">
		</center>
	</form>
</body>
<?php
	if(isset($_POST['ad']))
	{
		$val=$_POST['ad'];
		if($val=='type')
		{
			echo "<h2 style='color:orangered;margin-left:620px;'>";echo "choose one field "; echo "</h2>";
		}
		if($val=='room_allot')
		{
			echo "<h2 style='color:orangered;margin-left:620px;'>";echo "alloted_rooms "; echo "</h2><br>";
			$con=mysqli_connect("localhost","root","","hotel");
			$str="select * from room";
			$i=mysqli_query($con,$str);
			echo "<u><label style='margin-left:620px;font-size:22px;'>";
				echo "Username   &nbsp; &nbsp;&nbsp; ";
				echo "rooms    : ";
				echo "</label></u>";
			while($row=mysqli_fetch_array($i))
			{
				echo "<label style='margin-left:620px;font-size:22px;'>";
				echo $row['username'];
				echo "   :&nbsp; ";
				echo $row['rooms'];
				echo "<br>";
				echo "</label>";
			}
		}
		if($val=='food')
		{
			echo "<h2 style='color:orangered;margin-left:620px;'>";echo "food_requests "; echo "</h2><br>";
			$con=mysqli_connect("localhost","root","","hotel");
			$str="select * from food";
			$i=mysqli_query($con,$str);
			echo "<u><label style='margin-left:620px;font-size:22px;'>";
				echo "Username   &nbsp; &nbsp; ";
				echo "items     : ";
				echo "</label></u>";
			while($row=mysqli_fetch_array($i))
			{
				echo "<label style='margin-left:620px;font-size:22px;'>";
				echo $row['username'];
				echo "  &nbsp;  ";
				echo $row['items'];
				echo "<br>";
				echo "</label>";
			}
		}
		if($val=='payment')
		{
			echo "<h2 style='color:orangered;margin-left:620px;'>";echo "payments_list "; echo "</h2><br>";
			$con=mysqli_connect("localhost","root","","hotel");
			$str="select * from payment";
			$i=mysqli_query($con,$str);
				echo "<u><label style='margin-left:620px;font-size:22px;'>";
				echo "Username   &nbsp;  ";
				echo "Mode  &nbsp;&nbsp;  &nbsp;  ";
				echo "Card number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "expiry_date &nbsp;&nbsp;";
				echo "cvv";
				echo "</label></u>";
				echo "<br>";
			while($row=mysqli_fetch_array($i))
			{
				echo "<label style='margin-left:620px;font-size:22px;'>";
				echo $row['username'];
				echo " &nbsp;  ";
				echo $row['payment_mode'];
				echo "  &nbsp;";
				echo $row['card_no'];
				echo " &nbsp;  ";
				echo $row['expiry_date'];
				echo "   &nbsp; ";
				echo $row['cvv'];
				echo "<br>";
				echo "</label>";
			}
		}
		if($val=='feed')
		{
			echo "<h2 style='color:orangered;margin-left:620px;'>";echo "feedbacks  "; echo "</h2><br>";
			$con=mysqli_connect("localhost","root","","hotel");
			$str="select * from feedback";
			$i=mysqli_query($con,$str);
			echo "<u><label style='margin-left:620px;font-size:22px;'>";
				echo "Username   &nbsp; &nbsp; ";
				echo "rating  &nbsp; &nbsp;  : ";
				echo "feedback  &nbsp; &nbsp;  : ";
				echo "</label></u>";
			while($row=mysqli_fetch_array($i))
			{
				echo "<label style='margin-left:620px;font-size:22px;'>";
				echo $row['username'];
				echo "  &nbsp;&nbsp;  ";
				echo $row['rating'];
				echo "  &nbsp;&nbsp; &nbsp; ";
				echo "  &nbsp;&nbsp;  ";
				echo $row['feedb'];
				echo "<br>";
				echo "</label>";
			}
		}
		if($val=='contact')
		{
			echo "<h2 style='color:orangered;margin-left:620px;'>";echo "contacts "; echo "</h2><br>";
			$con=mysqli_connect("localhost","root","","hotel");
			$str="select * from contact";
			$i=mysqli_query($con,$str);
			while($row=mysqli_fetch_array($i))
			{
				echo "<label style='margin-left:620px;font-size:22px;'>";
				echo $row['username'];
				echo "  &nbsp;&nbsp;  ";
				echo $row['email'];
				echo "  &nbsp;&nbsp;  ";
				echo $row['mobile'];
				echo "  &nbsp;&nbsp;  ";
				echo $row['message'];
				echo "<br>";
				echo "</label>";
			}
		}
	}
	
	
?>