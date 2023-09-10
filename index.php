<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Greeting</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body><br>
    <center><span id="gt"></span></center>
    <p>
    <form method="POST" action="submit.php">
        Enter first name:
        <input name="fn" id="fn"><br><br>
        Enter last name:
        <input name="ln" id="ln"><br><br>
        <input class="prnt" type="button" value="Print">
        <a href="view.php"><input style="margin-left: 20px;" type="button" value="View"></a>
        <center><input class="prnt" name="fsub" type="submit"></center>
    </form>
    <span id="con"></span>
    </p>
    <script type="text/javascript" src="app.js"></script>
</body>

</html>