<?php
session_start();
if(!$_SESSION['log'])
	header("location:login.php");
?>
<html>
<head>
	<style>
		#d1
		{
			border:5px solid black;
			margin-left:400px;
			width:560px;
			margin-top:50px;
			height:480px;
		}
		input[type="submit"]
		{
			margin-left:180px;
			width:100px;
			height:40px;
		}
		
        
         body
         {
			background: url("home.jpg");
            background-size:cover;
            img-position:fixed;
          }
	</style>
</head>	

	<body>
         <a href="after_user_login_homeo.php">  <input style="background-color: red;margin-left:1280px;height:30px;" type="button" value="back"></a>   	
	<div id="d1">
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<div id="d2">
			<h1 style="margin-top: 25px;margin-left:120; border-radius: 20px;background-color: orangered;width:200"> <center>BOOKING</center></h1>
		</div>	
	
		USERNAME: <input style="width:250;height:35;border-color:black;"type="text" pattern="[a-z A-Z]{2,20}" readonly value="<?php echo $_SESSION['log'];?>" name="user"><br><br>
		FROM:<input style="margin-left:45px;width:250;height:35;border-color:black;"type="date" name="date" required><br><br>
                TO:<input style="margin-left:70px;width:250;height:35;border-color:black;"type="date" name="dat" required><br><br>
                MEMBERS : <input style="width:250;height:35;border-color:black;"type="tel"  name="mem" required><br><br>
                ROOMTYPE
                <select style="width:250;height: 35;border-color: black" name="roomt" required>
                    <option value="type">ROOM_TYPE</option>
                    <option value="normal">NORMAL</option>
                     <option value="luxury">LUXURY</option>
                    <option value="deluxe">DELUXE</option><?php echo $roomterr; ?>
                </select>
                <br><br>
				Rooms: <input style="margin-left:40px;width:250;height:35;border-color:black;" type="tel" name="room" required><br><br>
		<input type="submit" value="PROCEED">
	</form>
	</div>
</body>
</html>
<?php
	//echo "rakesh";
	$un=$fr=$to=$mem=$roomt=$room='';
	$unerr=$frerr=$toerr=$roomterr=$roomerr=$memerr='';
	$count=1;
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
			$un=$_SESSION['log'];
			$fr=$_POST['date'];
			$frd = new DateTime($fr);
       		$today   = new DateTime('today');
       		if($frd>=$today)
       		{
       			$count++;
       		}	
       		else
       		{
       			echo "<br><h2 style='color:orangered;'><center>";echo " FROM date is not valid"; echo "</h2></center>";
       		}
			$to=$_POST['dat'];
			$tod=new DateTime($to);
			if($tod>=$frd)
			{
				$count++;
			}
			else
			{
				echo "<h2 style='color:orangered;'><center>";echo " TO date is not valid"; echo "</h2></center>";
			}	
			$mem=$_POST['mem'];
			if($mem>0)
			{
				$count++;
			}
			else
			{
				echo "<h2 style='color:orangered;'><center>";echo " members value should above zero "; echo "</h2></center>";
			}
			$roomt=$_POST['roomt'];
			if($roomt=='type')
			{
				echo "<h2 style='color:orangered;'><center>";echo " select room type "; echo "</h2></center>";
			}
			else
			{
				$count++;
			}	
			$room=$_POST['room'];
			if($room>0)
			{
				$count++;
			}
			else
			{
				echo "<h2 style='color:orangered;'><center>";echo " room number should above zero "; echo "</h2></center>";
			}
			if($count==6)
			{
				$con=mysqli_connect("localhost","root","","hotel");
				$diff=date_diff($frd,$tod);
				$i=$diff->format("%a");
				$str="select * from room_allot";
				$rgu=mysqli_query($con,$str);
				$rak=mysqli_fetch_assoc($rgu);
				if($roomt=='normal')
				{
					$rc=$rak['normal'];
					$i++;
					$amount=$i*500;
					$amount=$amount*$room;
				}	
				else if($roomt=='luxury')
				{
					$rc=$rak['luxury'];
					$i++;
					$amount=$i*1000;
					$amount=$amount*$room;
				}
				else if($roomt=='deluxe')
				{
					$rc=$rak['deluxe'];
					$i++;
					$amount=$i*1500;
					$amount=$amount*$room;
				}
				$q=1;
				$rm='';
				for($q=1;$q<=$room;$q++)
				{
					$rk=$rc+$q;
					$rm=$rm .' , '.$rk;
				}
				$r="insert into booking values('$un','$fr','$to','$mem','$roomt','$room','$amount')";
				$_SESSION['amount']=$amount;
				mysqli_query($con,$r);
				$raki=$rc+$room;
				$qu="insert into room values ('$un','$rm')";
				mysqli_query($con,$qu);
				if($roomt=='normal')
				{
					$pr="update room_allot set normal='$rk' ";
				}	
				else if($roomt=='luxury')
				{
					$pr="update room_allot set luxury='$rk' ";
				}
				else if($roomt=='deluxe')
				{
					$pr="update room_allot set deluxe='$rk' ";
				}
				mysqli_query($con,$pr);
				header("location:payment.php");
				exit();	
		}	
	}	
?>