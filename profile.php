<?php
session_start();
if(!$_SESSION['log'])
	header("location:login.php");
?>
<html>
	<body>
		<h1 style="font-size:38px"><center>User Profile</center></h1>
			<a href="after_user_login_homeo.php">  <input style="background-color: red;margin-left:1280px;height:30px;" type="button" value="back"></a>
			
				<img src="user.jpg" width="230px" height="200px;" style="margin-left: 570px;">
				<?php
					echo '<h2 style="margin-left:550px;">'.'username : '.$_SESSION['log']."</h2>";
					echo '<h2 style="margin-left:550px;">'.'firstname : '.$_SESSION['fn']."</h2>";
					echo '<h2 style="margin-left:550px;">'.'lastname  :  '.$_SESSION['ln']."</h2>";
					echo '<h2 style="margin-left:550px;">'.'email : '.$_SESSION['mail']."</h2>";
					echo '<h2 style="margin-left:550px;">'.'mobile  : '.$_SESSION['mob']."</h2>";
				?>
	</body>
</html>