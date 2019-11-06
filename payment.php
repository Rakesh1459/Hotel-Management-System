<?php
	session_start();
	if(!$_SESSION['log'])
		header("location:login.php");
?>
<html>
	<body bgcolor=#7395AE>
	<h1 style="font-size:42px;color:white;"><center>Payment Section</center></h1><br><br>
	<?php
		$amount=$_SESSION['amount'];
		echo "<p style='font-size:22px;color:white;margin-left:520px;'>";echo "amount  is : ".$amount; echo "</p>";
	?>
		<form method="post" action="">
		<label style="color:white;font-size:20px;margin-left:520px;">payment option : </label>
		<input type="radio" name="radio" value="cash" >cash
		<input type="radio" name="radio" value="card">card<br>
		<br><input style="margin-left:540px;" type="submit" value="submit">
	</form>
</html>
<?php
	 if(isset($_POST['radio']))
	 {
		$mod=$_POST["radio"];
		if($mod=="cash")
		{
			$un=$_SESSION['log'];
			$pt="cash";
			$cn=mysqli_connect("localhost","root","","hotel");
       		$str="insert into payment(username,payment_mode) values('$un','$pt')";
       		mysqli_query($cn,$str);
			header("location:after_user_login_homeo.php");
		}
		else if($mod=="card")
		{
			echo "<form method='post' action=''>";
				echo "<input style='width:210px;height:35px;margin-left:530px;' type='text' name='cno' placeholder='Card Number' required  
				pattern='[0-9]+' title='enter valid 16 numbers 'minlength='16' maxlength='16'><br><br>";
				echo "<input style='width:210px;height:35px;margin-left:530px;' type='date' name='exp' placeholder='expiry_date' required  minlength='4' maxlength='16'><br><br>";
				echo "<input style='width:210px;height:35px;margin-left:530px;' type='text' name='cvv' placeholder='CVV' required  attern='[0-9]+' title='use numbers only 'minlength='3' maxlength='3'><br><br>";
				echo "<input style='width:210px;height:35px;margin-left:530px;background-color:green;color:white;' type='submit' value='pay'></center>";
			echo "</form>";
		}	
	}
	$count=0;
	if(isset($_POST['exp']))
	{
			$cno=$_POST['cno'];
			$cvv=$_POST['cvv'];
			$e=$_POST['exp'];
			$un=$_SESSION['log'];
			$frd = new DateTime($_POST['exp']);
       		$today   = new DateTime('today');
       		if($frd>$today)
       		{
       			$count++;
       		}	
       		else
       		{
       			echo "<br><h2 style='color:white;'><center>";echo " your card is expired!"; echo "</h2></center>";
       		}
       		if($count==1)
       		{
       			$pt="card";
       			echo "hello yaar";
       			$cn=mysqli_connect("localhost","root","","hotel");
       			$str="insert into payment values('$un','$pt','$cno','$e','$cvv')";
       			mysqli_query($cn,$str);
       			header("location:after_user_login_homeo.php");
       		}	
	}
/*</body><input type="radio" name="pay" value="card"> card
			<input style="margin-left:520px;width:265px;height:35px;" type="text" placeholder="card no" > <span style="color:white;font-size:18px;"> (optional for cash mode )</span><br>
			<br><input style="margin-left:520px;width:265px;height:35px;" type="text" placeholder="expiry date" ><span style="color:white;font-size:18px;"> (optional for cash mode )</span>
			<br><br><input style="margin-left:520px;width:265px;height:35px;" type="text" placeholder="cvv" ><span style="color:white;font-size:18px;"> (optional for cash mode )</span><br><br>
			<input style="margin-left:520px;width:265px;height:35px;" type="submit" value="submit" >
			</form>*/
?>