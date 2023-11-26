<?php
    session_start();
    if(!isset($_SESSION["Email"]) || !isset($_GET["diskusijaID"]))
    header("Location: index.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    include("db.php");
    $diskusijaID = $_GET["diskusijaID"];
    $con = connect();
    $result = $con->query("SELECT comments.*, users.Username FROM comments, users WHERE users.UserID = comments.UserID and comments.DiskusijaID=$diskusijaID");
    while($row = $result->fetch_assoc()) {
        echo "Tekst:".$row["Tekst"]."\nKorisnik".$row["Username"]."\nBrLajkova".$row["BrLajkova"];
    }
    ?>
    <form action="comments.php">
        <input type="text" name="Komentar" id="Komentar" placeholder="Унесите свој коментар">
        <input type="submit" name="Sub" id="Sub" value="ОБЈАВИ">
    </form>
</body>
</html>