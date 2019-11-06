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
			margin-left:70px;
			margin-right:600px;
			margin-top:50px;
			height:450px;
		}
		input[type="submit"]
		{
			margin-left: 89px;
			width:300;
			height:45;
			border-color:black;
			font-size: 18px;
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
<h1 ><center>welcome to Feedback Section</center></h1>
  <a href="after_user_login_homeo.php">  <input style="background-color: red;margin-left:1280px;height:30px;" type="button" value="back"></a>  
	<div id="d1">
	<form method="post" action="">
		<div id="d2">
			<h1 style="margin-top: 25px;margin-left:120; border-radius: 20px;width:200"> <center>FEEDBACK</center></h1>
		</div>	
	
		USERNAME: <input style="width:300;height:45;border-color:black;"type="text" readonly value="<?php echo $_SESSION['log'];?>" name="n" ><br><br>
		FEEDBACK : <input style="width:300;height:150;border-color:black;" type="text" name="feed" required><br><br>
		RATING : 
                <select style="width:300;height: 35;border-color: black;margin-left:22px;font-size:18px " name="rate" required>
                    <option value="type">RATING</option>
                    <option value="five">5</option>
                     <option value="four_half">4.5</option>
                    <option value="four">4</option>
                     <option value="three_half">3.5</option>
                      <option value="three">3</option>       
                </select>
                <br><br>
                <input type="submit" value="submit">	
	</form>
	</div>
</body>
</html>
	<?php
			if(isset($_POST['feed']))
			{
				$count=2;
				$f=$_POST['feed'];
				if(isset($_POST['rate']))
				{
					$un=$_SESSION['log'];
					$r=$_POST['rate'];
					if($r!='type')
					{	
						$conn=mysqli_connect("localhost","root","","hotel");
						$s="insert into feedback values('$un','$f','$r')";
						mysqli_query($conn,$s);
						header("Location:after_user_login_homeo.php");
						exit();
					}
					else
					{
						echo "<h2 style='color:orangered;'>";echo " please give rating! "; echo "</h2>";
					}
				}	
			}
	?>