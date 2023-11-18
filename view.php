<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Greeting</title>
    <style>
        td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>

<body>
    <?php
    $srv = "0.0.0.0";
    $usn = "admin";
    $pass = "admin123";
    include 'config.php';
    $conn = mysqli_connect($srv, $usn, $pass, $usn . "_Avinash");
    if (!$conn)
        die("Connection lost!");
    mysqli_query($conn, "CREATE TABLE IF NOT EXISTS `user`(`Sr.no` INT(2) NOT NULL AUTO_INCREMENT,`First name` VARCHAR(12) NOT NULL,`Last name` VARCHAR(12) NOT NULL,PRIMARY KEY(`Sr.no`));");
    if (isset($_SESSION["post"]))
        $_POST = $_SESSION["post"];
    session_destroy();
    if (isset($_POST['fsub'])) {
        $firstName = $_POST["fn"];
        $lastName = $_POST["ln"];
        if (file_exists("/storage/emulated/0/Server/") || mkdir("/storage/emulated/0/Server/", recursive: true)) {
            $file = fopen("/storage/emulated/0/Server/data.txt", "w");
            $wr = "First name: $firstName\nLast name: $lastName\n";
            fwrite($file, $wr);
            fclose($file);
        }
        $res = mysqli_query($conn, "INSERT INTO `user`(`First name`,`Last name`) VALUES('$firstName','$lastName');");
        pmsg($res, "inserted");
    }
    $res = mysqli_query($conn, "SELECT * FROM `user`;");
    $ar = array();
    while ($row = mysqli_fetch_assoc($res))
        array_push($ar, $row['Sr.no']);
    for ($i = 0; $i < count($ar); $i++) {
        if (isset($_POST["del$i"]))
            dlt($ar[$i]);
    }
    $res = mysqli_query($conn, "SELECT * FROM `user`;");
    $num = mysqli_num_rows($res);
    echo "$num records are found.<br>";
    $num = 0;
    echo "<table border='1' cellspacing='0'>
<tr>
<th>Sr.no.</th>
<th>First name</th>
<th>Last name</th>
<th>Actions</th>
</tr>";
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<tr>
<td>" . ($num + 1) . "</td>
<td>" . $row['First name'] . "</td>
<td>" . $row['Last name'] . "</td>
<td><form method='POST' action='submit.php'>
<button name=del$num><img width='20px' src='images/del.png' alt='Delete'></button></form></td>
</tr>";
        $num++;
    }
    echo "</table>";
    function dlt($i)
    {
        global $conn;
        $res = mysqli_query($conn, "DELETE FROM `user` WHERE `Sr.no` = '$i'");
        pmsg($res, "deleted");
        return $res;
    }
    function pmsg($res, $mess)
    {
        if ($res)
            echo "<br><b>Record $mess!</b><br><br>";
        else
            echo "<br>Record <b>NOT</b> $mess!<br><br>";
    }
    mysqli_close($conn);
    ?><br><br>
    <center>
        <form action="index.php"><input type="submit" value="🏠Home"></form>
    </center>
</body>

</html>