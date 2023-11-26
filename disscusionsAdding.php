<?php
    session_start();
    include "db.php";
    $conn = connect();
    if(isset($_POST["Tekst"]))
    {
        $conn->query("INSERT INTO discussion VALUES (NULL, ".$_SESSION["ID"].",'".$_POST["Naslov"]."',NOW(), 0,'".$_POST["Tekst"]."')");
        
        //header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="disscusionsAdding.php" method="post" onsubmit="return validateDiscussion()">
        <input id="Naslov" type="text" placeholder="Наслов" name="Naslov">
        <input id="Tekst" type="text" placeholder="Текст" name="Tekst">
        <input type="submit" value="Objavi" name="Sub">
    </form>
    <script type="text/javascript" src="scripts/validations.js"></script>
</body>
</html>