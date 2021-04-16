<?php
session_start();

?>


<!DOCTYPE html>
<html>
<head>
  <title> </title>
</head>

<body>

 <?php
   echo "<h2> Welcome ". $_SESSION['name'] ."</h2>";

?>

 <p>Thank you for the Zuri internship >:</p>
 <br>

 <form action="logout.php">
        <input type="submit" value="Logout" />
 </form>


</body>
</html>


