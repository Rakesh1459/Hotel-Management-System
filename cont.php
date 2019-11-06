<?php
	session_start();
	if(!$_SESSION['log'])
		header("location:login.php");
?>
<html>
    <head>
        <style>
			body
			{
				background-color:#123123;
			}
			#d1
			{	
				margin-left:320px;
				width:650px;
				height:480px;
				background-color:#127459;
			}
            </style>
        </head>
<body>
<h1 style="color:white;font-size:45px;"><center>welcome to Contact Section</center></h1>
  <a href="Home_original.php">  <input style="background-color: green;margin-left:1280px;height:30px;" type="button" value="back"></a>
	<div id="d1">
		<form action="" method="post">
			<input style="margin-left:130px;width:320px;height:35px;margin-top:35px;" type="text" name="mob" placeholder="Mobile number" 
			pattern="[6-9][0-9]{9}$" maxlength="10" minlength="10" title="enter valid mobile number" required ><br>
			<input style="margin-left:130px;width:320px;height:35px;margin-top:35px;" type="email" name="em" placeholder="Email" required><br>
			<input style="margin-left:130px;width:320px;height:100px;margin-top:35px;" type="text" name="mes" pattern="[0-9a-zA-Z]+$" placeholder="message" required title="enter valid message"><br>
			<input style="margin-left:130px;width:320px;height:35px;margin-top:35px;" type="submit" value="submit">
		</form>
	</div>
	<h1></h1>

	<u><p style="color:orangered;margin-left:1050px; margin-top:-450px;font-size: 32px;">Contact</p></u>
	<p style="color:white;margin-left:1050px; margin-top:30px;">Mobile : 8374495137</p>
	<p style="color:white;margin-left:1050px; margin-top:30px;">Email: rakeshpakide@gmail.com</p>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$count=1;
		$un=$_SESSION['log'];
		$rak=$_POST['mob'];
		$r=strlen($rak);
		//echo $rak[0];
		if($r!=10)
		{
			echo "error";
		}
		else if(!preg_match("/^[6-9]+$/",$rak[0]))
		{
			echo "<br><h2 style='color:orangered;'>";echo " Enter valid mobile number"; echo "</h2>";
		}		
		else
		{	
			$m=$_POST['mobile'];
			$count++;
		}	
		$em=$_POST['em'];
		$mes=$_POST['mes'];
		if(count==2)
		{
			$conn=mysqli_connect("localhost","root","","hotel");
			$s="insert into contact values('$un','$m','$em','$mes')";
			if($conn->query($s)==TRUE){
				echo "Success";
				header("Location:after_user_login_homeo.php");
				exit();
				}
		}	
			
	}
	
?>
