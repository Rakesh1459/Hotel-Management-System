<?php
?>
<html>
<head>
	<style>
		#d1 
			{
				width:620px;
				margin:40px 100px 100px 470px;
				border-style: solid;
				border-width: 5px;
				border-color:brown;
				background:url("back.png");
				background-repeat:no-repeat;
				
			
			}
			
            
                        body
                        {
                           background: url(home.jpg);
                           background-size:cover;
                           img-position:fixed;
                        }
	</style>
       <script src="myvalid.js"></script>
</head>
<?PHP
$fn=$ln=$un=$p=$em=$mob=$age=$add='';
$count=0;

$fnerr=$lnerr=$unerr=$perr=$emerr=$moberr=$ageerr=$adderr='';
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
		if(!empty($_POST['fname']))
		{
			$n=$_POST['fname'];
			if(!preg_match("/^[a-zA-Z ]*$/",$n))
				$fnerr='use alphabets only ';
			else
			{
				$fn=$_POST['fname'];
				$count++;
			}
		}
		else
		{
			$fnerr='fname is required';
		}
		if(!empty($_POST['lname']))
		{
			$nn=$_POST['lname'];
			if(!preg_match("/^[a-zA-Z ]*$/",$nn))
				$lnerr='use alphabets only ';
			else
			{
				$ln=$_POST['lname'];
				$count++;
			}
		}
		else
		{
			$lnerr='lname is required';
		}
		if(!empty($_POST['uname'])&&preg_match("/^[0-9a-zA-Z]+$/",$_POST['uname']))
		{
			$ra=$_POST['uname'];
			$con=mysqli_connect("localhost","root","","hotel");
			$que="select username from reg where username='$ra'";
			$result = mysqli_query($con,$que);
			if(mysqli_num_rows($result)>0)
			{
				echo "<p style='font-size:26px'>username already existed!</p>";
			}
			else
			{
				$un=$_POST['uname'];
				$count++;
			}	
				
		}
		else
		{
			$unerr='username is required or not valid ';
		}
		
		if(!empty($_POST['pass']))
		{
			$rp=$_POST['pass'];
			$pp=strlen($rp);
			if($pp<8||$pp>12)
			{
				$perr='pasword length b/w 8 and 12 ';
			}
			else
			{
				$p=$_POST['pass'];
				$count++;
			}
		}
		else
		{
			$perr='password is required';
		}
		
		
		if(!empty($_POST['mail']))
		{
			$em=$_POST['mail'];
			$count++;
		}
		else
		{
			$emerr='email is required';
		}
		
		if(!empty($_POST['mobile']))
		{
			$rak=$_POST['mobile'];
			$r=strlen($rak);
			//echo $rak[0];
			if($r!=10)
			{
				$moberr='enter valid mobile number';
			}
			else if(!preg_match("/^[6-9]+$/",$rak[0]))
			{
					$moberr='enter valid mobile number';
			}		
			else
			{	
				$mob=$_POST['mobile'];
				$count++;
			}	
		}
		else
		{
			$moberr='mobile is required';
		}
		if(!empty($_POST['age']))
		{
			$atest=$_POST['age'];
			if($atest<18||$atest>120)
				$ageerr='enter valid age ';
			else
			{
				$age=$_POST['age'];
				$count++;
			}
		}
		else
		{
			$ageerr='age is required';
		}
		
		if(!empty($_POST['address']))
		{
			$addtest=$_POST['address'];
			if(!preg_match("/^[0-9a-zA-Z]+$/",$addtest))
				$adderr="user alphanumeric only ";
			else
			{
				$add=$_POST['address'];
				$count++;
			}
		}
		else
		{
			$adderr='address is required';
		}
		//echo $fn.$ln.$un.$p.$em.$mob.$age.$add;
		if($count==8)
		{
			//echo " entered";
			$conn=mysqli_connect("localhost","root","","hotel");
			$s="insert into reg values('$fn','$ln','$un','$p','$em','$mob','$age','$add')";
			if($conn->query($s)==TRUE){
				//echo "Success";
				header("Location:login.php");
				exit();
			}
			else{
			echo $conn->error;
			}
		}
		
	}

?>
<body >
	<h1><center><u>Welcome to New User Page</u></center></h1>
          <a href="Home_original.php">  <input style="background-color: red;margin-left:1280px;height:30px;" type="button" value="back"></a>  
	<div id="d1">
	<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
	<label>FNAME:</label><input style="margin-left:60px; width:230px;height:30px;margin-top:10px;" type="text" placeholder="FNAME" name="fname"  pattern="[A-Z a-z]{5,13}" title="enter valid name " value="<?php $fn?>" required minlength="3"><div style="color:red;margin-left:400px;margin-top:-30px;"><?php echo $fnerr;?></div><br><br>
    <label>LNAME:</label><input style="margin-left:60px; width:230px;height:30px;margin-top:10px;" type="text" placeholder="LNAME" name="lname" pattern="[A-Z a-z]{5,13}" title="enter valid name "  required minlength="3"><div style="color:red;margin-left:400px;margin-top:-30px;"><?php echo $lnerr;?></div><br><br>
	<label>USERNAME:</label><input style="margin-left:30px; width:230px;height:30px;margin-top:10px;" type="text" placeholder="USERNAME" minlength="5" maxlength="12" pattern="[A-Z a-z 0-9]{5,13}+$" title="enter valid username " name="uname" required ><br><br>
        <label>PASSWORD:</label><input style="margin-left:30px; width:230px;height:30px;margin-top:10px;" type="password" placeholder="PASSWORD"  minlength="8" maxlength="12" name="pass" pattern="[A-Z a-z 0-9]{5,13}+$" title="enter valid password " required ><div style="color:red;margin-left:400px;margin-top:-30px;"><?php echo $perr;?></div></br><br>
       <label> EMAIL :</label><input style="margin-left:60px; width:230px;height:30px;margin-top:10px;" type="email" placeholder="MAIL" name="mail" required /><div style="color:red;margin-left:400px;margin-top:-30px;"><?php echo $emerr;?></div></br><br>
        <label>MOBILENO:</label><input style="margin-left:30px; width:230px;height:30px;margin-top:10px;" type="tel" maxlength="10" minlength="10" placeholder="MOBILE " width=20px name="mobile" required pattern="[6789][0-9]{9}" title="enter valid mobile number" /><br></br>
	<label>AGE :</label><input style="margin-left:75px; width:230px;height:30px;margin-top:10px;"  type="number" placeholder="AGE" width=20px name="age" min="10" max="120" title="enter valid age" pattern="[0-9]" required/></br><br>
	<label>ADDRESS :</label><input  style="margin-left:35px; width:230px;height:30px;margin-top:10px;" type="text" placeholder="ADDRESS" name="address" minlength="4" pattern="[A-Z a-z 0-9]{5,13}+$" title="enter valid address" required /</br><br>
	<br><input style="width:230px;height:30px;margin-left:120px;background-color:green;font-size:18px;" type="submit" value="submit" />
	</form>
	</div>
</body>	
</html>