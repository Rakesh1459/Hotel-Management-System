<?php
?>
<html>
<head>
	<style type="text/css">
        #d1 
			{
				width:400px;
				height:280px;
				margin:40px 100px 100px 470px;
				border-style: solid;
				border-width: 5px;
				border-color:brown;
				background:url("back.png");
				background-repeat:no-repeat;
				
			
			}
			#d1 input[type=text],input[type=number],input[type=text],input[type=text],input[type=password]
			{
                                color:black;
				border:2px solid black;
				width:220px;
				height:35px;
				margin-top:30px;
				margin-left:45px;		
			}
                        #d1 input[type=submit]
			{
                                background-color: green;
                                color:black;
                                font-size:20px;
				border:2px solid black;
				width:220px;
				height:35px;
				margin-top:30px;
				margin-left:70px;		
			}    
body
{
    background: url("home.jpg");
     background-size:cover;
    img-position:fixed;
}

	</style>
        <script src="logvalid.js"></script>
</head>
<?php
	$in='';
	SESSION_START();
	if($_SERVER['REQUEST_METHOD']=='POST')
	{
	
		$un=$_POST['n'];
		$p=$_POST['pass'];
		$conn=mysqli_connect("localhost","root","","hotel");
		$s="select username,password from reg where username='$un' and password='$p'";
		$result = mysqli_query($conn,$s);
		$r=mysqli_fetch_assoc($result);
		$us=$r['username'];
		$pa=$r['password'];
		if($un==$us and $p==$pa)
		{
			$_SESSION['log']=$us;
			$conn=mysqli_connect("localhost","root","","hotel");
			$s="select * from reg where username='$us'";
			$rs = mysqli_query($conn,$s);
			$rr=mysqli_fetch_assoc($rs);
			$em=$rr['email'];
			$mobil=$rr['mobile'];
			$fn=$rr['fname'];
			$ln=$rr['lname'];
			$_SESSION['mail']=$em;
			$_SESSION['mob']=$mobil;
			$_SESSION['fn']=$fn;
			$_SESSION['ln']=$ln;
			header('location:after_user_login_homeo.php');
			exit();
		}
		else
		{
			$in='invalid deatails';
		}
	}	
?>	
	<body>
		<h1><center>Welcome to Login Page</center></h1>
                
                  <a href="Home_original.php">  <input style="background-color: red;margin-left:1280px;height:30px;" type="button" value="back"></a>  
		<div id="d1">
		<form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
                <label>USERNAME:</label><input type="text" placeholder="USERNAME" name="n" /></br></br>
                <label>PASSWORD:</label><input type="password" placeholder="PASSWORD" name="pass" /></br></br>
                <input type="submit" value="login">
				<div style='font-size:30px;margin:100px 100px;'><?php echo $in;?>
                </form>
		</div>
	</body>
	
</html>