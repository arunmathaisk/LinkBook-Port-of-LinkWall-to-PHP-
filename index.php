<?php
 require 'rb-sqlite.php';
 session_start();
 if(!isset($_SESSION['AUTH']))
 {
	 header("location:login.php");
     exit;
 }
 $cur_dir = getcwd();
  $cur_dir = "sqlite:". $cur_dir . "/linkbook.db"; 
  R::setup($cur_dir);
  $link = R::dispense( 'link' );
  $link->url = '';
  $sr_no=1;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $link->url = $_POST["url"];
   R::store($link);  
}

?>
<html>
<head>
<h1><center>Link Book</center></h1>
<div align="right">
<a href="logout.php">Logout</a>
</div>
<hr>
</head>
<body>
<form action="index.php" method="post">
Enter the url:
<input type="text" name="url">
<input type="submit">
</form>
<table border="2" >
<tr>
	<td><b>SR.NO</b></td>
    <td><b>URl</b></td>
    <td><b>DELETE</b></td>
    
 </tr>
<?php
  $links = R::findAll('link');
  foreach ($links as $link)
  {
?>
  <tr>
  <td><?php echo $sr_no; ?></td>
  <td><a href="<?php echo $link->url; ?>"><?php echo $link->url; ?></a></td>
  <td><a href="delete.php?id=<?php echo $link->id; ?>">Delete</a></td>
  </tr>
<?php  
	$sr_no++;
  }
?>
</table>
</body>

</html>
