<?php
 $con = mysqli_connect("localhost", "adminhq", "qutAerospace!31", "flurosatcamera");
 
 if (mysqli_connect_errno($con))
 {
 echo "Unable to connect to the server: " . mysqli_connect_error();
 exit();
 }
?>
