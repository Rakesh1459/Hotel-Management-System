<?php

session_start();
?>
<html>
   <head>
       <style>
           #id1
           {
               margin-left: 1270px;
               background-color:green;
               width: 60px;
               height:30px
               
           }
        </style>   
    </head>   
<body>
    <h1><center>Welcome to Gallery Section</center></h1>
    <?php
      if(!isset($_SESSION['log']))
        echo "<a href='Home_original.php'><input id='id1' type='button' value='back'>";
      else
        echo "<a href='after_user_login_homeo.php'><input id='id1' type='button' value='back'>";
   ?> 
 <br>    
<a href="firstimage.html"><img src="43620218.jpg" width="440px" height="250px"/></a>
<a href="secondimage.html"><img src="logg.jpg" width="440px" height="250px"/></a>
<a href="thim.html"><img src="hotel-turkey.jpg" width="440px" height="250px"/></a><br>
<a href="fourthim.html"><img src="slider5.jpg" width="440px" height="250px"/></a>
<a href="fivthim.html"><img src="TS_Hotel_King_lowrez-1.jpg" width="440px" height="250px"/></a>
<a href="six.php"><img src="book.jpg" width="440px" height="250px"/></a>
</body>
</html>