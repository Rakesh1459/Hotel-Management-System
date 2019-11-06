<?php
?>
<html>
<head>
	<style type="text/css">
        #d1 
			{
				width:400px;
				height:290px;
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
	<body>
		<h1><center>Welcome to Login Page</center></h1>
                
                  <a href="homeo.php">  <input style="background-color: red;margin-left:1280px;height:30px;" type="button" value="back"></a>  
		<div id="d1">
		<form  action="validlog" method="post" >
                <label>USERNAME:</label><input type="text" placeholder="USERNAME" name="n" /></br></br>
                <label>PASSWORD:</label><input type="password" placeholder="PASSWORD" name="pass" /></br></br>
                <input type="submit" value="login"><br>
              <center>  <p style="color:red;font-size:25px;">  your not authorize to login</center></p>
                </form>
		</div>
	</body>
</html>