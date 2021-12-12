<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<title>Greeting</title>
</head>
</html>
<?php
 $srv="0.0.0.0";
 $usn="root";
 $pass="root";
 $conn=mysqli_connect($srv,$usn,$pass,"Avinash");
 if(!$conn)
 die("Connection lost!");
 mysqli_query($conn,"CREATE TABLE `user`(`Sr.no` INT(2) NOT NULL AUTO_INCREMENT,`First name` VARCHAR(12) NOT NULL,`Last name` VARCHAR(12) NOT NULL,PRIMARY KEY(`Sr.no`));");
 if(isset($_POST['fsub'])){
  $file=fopen("/storage/emulated/0/Server/data.txt","w");
  $firstName=$_POST["fn"];
  $lastName=$_POST["ln"];
  $wr="First name: $firstName\nLast name: $lastName";
  fwrite($file,$wr);
  fclose($file);
  $res=mysqli_query($conn,"INSERT INTO `user`(`First name`,`Last name`) VALUES('$firstName','$lastName');");
  pmsg($res,"inserted");
 }
 $res=mysqli_query($conn,"SELECT * FROM `user`;");
 $ar=array();
 while($row=mysqli_fetch_assoc($res))
 array_push($ar,$row['Sr.no']);
 for($i=1;$i<=count($ar);$i++){
  if(isset($_POST["del$i"]))
  dlt($ar[$i-1]);
 }
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
  <td><form method='POST' action='submit.php'>
  <button name=del$num><img width='20px' src='images/del.png' alt='Delete'></button></form></td>
  </tr>"; $num++;
 }
 echo "</table>";
 function dlt($i){ global $conn;
  $res=mysqli_query($conn,"DELETE FROM `user` WHERE `Sr.no` = '$i'");
  pmsg($res,"deleted");
  return $res;
 }
 function pmsg($res,$mess){
  if($res)
  echo "<b>Record $mess!</b><br>";
  else
  echo "Record <b>NOT</b> $mess!<br>";
 } mysqli_close($conn);
?>