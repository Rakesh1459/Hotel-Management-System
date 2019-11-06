<!doctype html>
<html>
<head>
<style type="text/css">

#div1
{
background:#fffff;
margin-top:-05px;
margin-left:-6px;
margin-right:-07px;
font-size:50px;
color:red;
}
body
{
	background-repeat:no-repeat;
	background-size:cover;
	height:735px;
}
<!--
table
{

	margin-top:400px;
	margin-left:130px;
	font-size:35px;
	
}
#h6p
{
	margin-top:85px;
	margin-left:1480px;
	margin-right:10px;
	font-size:15px;
	color:#ffffff;
}
#linebar
{
	background:#000000;
	width:1500px;
	height:40px;
	margin-top:-130px;
}
#home
{
	font-size:28px;
	margin-left:92px;
	margin-top:-35px;
	font-family:bold;
	font-stretch:10px
}
#home1
{
	font-size:28px;
	margin-left:299px;
	margin-top:-71px;
	font-family:bold;
	font-stretch:10px
}
#home2
{
	font-size:28px;
	margin-left:525px;
	margin-top:-71px;
	font-family:bold;
	font-stretch:10px
}
#home3
{
	font-size:28px;
	margin-left:759px;
	margin-top:-71px;
	font-family:bold;
	font-stretch:10px
}

#home4
{
	font-size:28px;
	margin-left:999px;
	margin-top:-68px;
	font-family:bold;
	font-stretch:10px
}
#home5
{
	font-size:28px;
	margin-left:1250px;
	margin-top:-67px;
	font-family:bold;
	font-stretch:10px
}
img
{
	margin-left:50px;
	margin-top:-75px;
	margin-bottom:51px;
	
}
#img1
{
	margin-left:209px;
	margin-top:-20px;
	margin-bottom:51px;
}

#img2
{
	margin-left:669px;
	margin-top:-70px;
	margin-bottom:51px;
}

#img3
{
	margin-left:909px;
	margin-top:-70px;
	margin-bottom:51px;
}
#img4
{
	margin-left:1159px;
	margin-top:-70px;
	margin-bottom:51px;
}-->

#container ul
{
	list-style:none;
}
#container ul li
{
	border:1px solid white;
	background:#000000;
	width:200px;
	height:40px;
	font-size:30px;
	margin-left:-40px;
	margin-top:-117px;
	margin-bottom:300px;
	text-align:center;
	float:left;
	color:#ffffff;
	font-family:bold;	
}
#container ul li:hover
{
	background:green;
}
#container ul ul
{
	display:none;
}
</style>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    text-align: left;
    font-size: 30px;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}

.dropbtn {
    background-color: #000000;
    color: white;
    padding: 16px;
    font-size: 26px;
    border: none;
	width:200px;
	height:40px;
	text-align:center;
	margin-top:-3px;
    cursor: pointer;
}

.dropdown {
    position: relative;
    display: inline;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    //display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
    //display: block;
}

.dropdown:hover .dropbtn {
    //background-color: #3e8e41;
} 
</style>
</head>
<?php
session_start();
if(!isset($_SESSION['log']))
{
	header("location:login.php");
	exit();
}
else
{
?>
<body background= "home.jpg" style="background-repeat: no-repeat;position: fixed;">
	
	
	
<div id="div1"><center>ONLINE HOTEL MANAGEMENT</center></div>
<h6 id="h6p">AP</h6>

<div id="container">
<ul>
 <li>Home</li>
 <?php
      if($_SESSION['log']=='admin')
        echo "<a href='#'><li>Booking</li></a>";
      else
        echo "<a href='book.php'><li>Booking</li></a>";
   ?> 
   <?php
      if($_SESSION['log']=='admin')
        echo "<a href='#'><li>Services</li></a>";
      else
	  {
		    echo "<li><div class='dropdown'>Services<div class='dropdown-content'>";
			echo "<a href='food.php'>food</a>";
			echo "<a href='hk.php'>housekeeping</a>";
			echo "<a href='roomallot.php'>Room Allotments</a>";
			echo "</div>";
			echo "<ul><li>food</li><li>housekeeping</li><li>extra</li><li>electricals</li></ul>";
			echo "</li>";
	  }
   ?> 
<a href="ser.php"><li>gallery</li></a>
<?php
      if($_SESSION['log']=='admin')
        echo "<a href='#'><li>feedback</li></a>";
      else
        echo "<a href='feedback.php'><li>feedback</li></a>";
   ?> 
   <?php
      if($_SESSION['log']=='admin')
        echo "<a href='#'><li>Contact</li></a>";
      else
        echo "<a href='contact.php'><li>Contact</li></a>";
   ?> 
<?php
      if($_SESSION['log']=='admin')
        echo "<a href='admin.php'><li>admin_page</li></a>";
      else
        echo "<a href='#'><li>admin_page</li></a>";
   ?> 
<li style='margin-left:1px;margin-top:-115px;width:20px;height:30px;text-align:center;padding-top:-30px;'>
<div class="dropdown" style='width:20px;height:20px;'>
  <button class="dropbtn" style='text-align:center;'><?php echo $_SESSION['log'];?></button>
  <div class="dropdown-content">
    <a href="profile.php">Profile</a>
    <a href="logout.php">Logout</a>
  </div>
</div></li>
</ul>
</div>

</body>
</html>
<?php
}