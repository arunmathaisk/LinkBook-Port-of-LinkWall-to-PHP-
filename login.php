<?php
 session_start();
 if(isset($_SESSION['AUTH']))
 {
	 header("location:index.php");
     exit;
 }
 $password = "";
 if($_SERVER["REQUEST_METHOD"] == "POST") {
   $password = $_POST["password"];
   if(strcmp($password,"royal_stag")==0)
   {
	    $_SESSION['AUTH'] = "YES";
		header("location:index.php");
        exit;
   }
}
?>
<html>
<head>
<h1><center>Link Book</center></h1>
<hr>
</head>
<body>
<center>

<form action="login.php" method="post">
Password:
<input type="password" name="password">
<input type="submit">
</form>
</center>
</body>

</html>
