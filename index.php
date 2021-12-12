<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Greeting</title>
<link rel="stylesheet" href="styles.css">
</head>
<body><br>
<center><span id="gt"></span></center>
<p>
<form method="POST" action="submit.php" onsubmit="CrFile()">
Enter first name:
<input name="fn" id="fn"><br><br>
Enter last name:
<input name="ln" id="ln"><br><br>
<input type="submit" name="fsub">
</form>
<center><button id="sub">Print</button></center>
<span id="con"></span>
</p>
<script type="text/javascript" src="app.js"></script>
</body>
</html>
<!--<?php
 if(isset($_POST['fsub'])){
  $file=fopen("/storage/emulated/0/Server/data.txt","w");
  $firstName=$_POST["fn"];
  $lastName=$_POST["ln"];
  $wr="First name: $firstName\nLast name: $lastName";
  fwrite($file,$wr);
  fclose($file);
  $srv="0.0.0.0";
  $usn="root";
  $pass="root";
  $conn=mysqli_connect($srv,$usn,$pass,"Avinash");
  if(!$conn)
  die("Connection lost!");
  //mysqli_query($conn,"CREATE TABLE `user`(`Sr.no` INT(2) NOT NULL AUTO_INCREMENT,`First name` VARCHAR(12) NOT NULL,`Last name` VARCHAR(12) NOT NULL,PRIMARY KEY(`Sr.no`));");
  $res=mysqli_query($conn,"INSERT INTO `user`(`First name`,`Last name`) VALUES('$firstName','$lastName');");
  if($res)
  echo "<b>Record inserted!</b><br>";
  else
  echo "Record <b>NOT</b> inserted!<br>";
  $res=mysqli_query($conn,"SELECT * FROM `user`;");
  $num=mysqli_num_rows($res);
  echo "$num records are found.<br>";
  $num=1;
  echo "<table border='1' cellspacing='0'>
  <tr>
  <th>Sr.no.</th>
  <th>First name</th>
  <th colspan='2'>Last name</th>
  </tr>";
  while($row=mysqli_fetch_assoc($res)){
   echo "<tr>
   <td>".$num."</td>
   <td>".$row['First name']."</td>
   <td>".$row['Last name']."</td>
   <td><input type='image' src='images/del.png' width='20px' id='del' alt='Delete'></td>
   </tr>"; $num++;
  }
  echo "</table>";
 }
?>-->