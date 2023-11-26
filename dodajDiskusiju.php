<?php 
    session_start();
    if(!isset($_SESSION["Email"]))
        header("Location: index.php")
?>
<?php
   
    include "db.php";
    $conn = connect();
    if(isset($_POST["Tekst"]))
    {
        $conn->query("INSERT INTO discussion VALUES (NULL, ".$_SESSION["ID"].",'".$_POST["Naslov"]."',NOW(), 0,'".$_POST["Tekst"]."')");
        
        header('Location: disscusion.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dodajKomentar.css">
    <script src="scripts/script.js"></script>
    <title>Document</title>
</head>
<body>
    <header class="zaglavlje">
        <nav>
            <div class="logo">
                <img src="slike/Smart__1_-removebg-preview2-removebg-preview.png" alt="logo" class="SlikaLoga">
            </div>
            <div class="navmeni">
                <div class="dropdown">
                    <button onclick="myFunction()" class="dropbtn">СКУП СВИХ СТРАНИЦА</button>
                    <div id="myDropdown" class="dropdown-content">
                        <a href="index.php" >ПОЧЕТНА</a>
                        <a href="disscusion.php"  id="active">ДИСКУСИЈE</a>
                        <?php echo '<a href="logout.php">'.$_SESSION["Email"].'</a>';?>
                        
                    </div>
                  </div>
                  
            <a href="index.php" class="navigacioniMeni">ПОЧЕТНА</a>
            <a href="disscusion.php" class="navigacioniMeni" id="active">ДИСКУСИЈE</a>
            <?php echo '<a href="logout.php" class="navigacioniMeni">'.$_SESSION["Email"].'</a>';?>
            
        </div>
        </nav>
    </header>

    <main>
        
        <!--<div class="margineDiskusije">
<div class="korisnickoime">
    <p class="ime"><?php echo $_SESSION["Username"]?></p>
</div>
<div class="naslov">
    <input type="text" name="Naslov" class="NASLOV" placeholder="Dodaj Naslov">
</div>
<div class="blog">
    <textarea name="Dodaj" id="Komentar" cols="1000" rows="10" style="text-indent: 50px;"></textarea>
</div>
<div class="objavi">
    <input type="submit" value="OBJAVI" class="DODAJ">
</div>
        </div> -->
        <form class="margineDiskusije" method="POST" action="dodajDiskusiju.php">
            <div class="korisnickoime">
                <p class="ime"><?php echo $_SESSION["Username"]?></p>
            </div>
            <div class="naslov">
                <input type="text" name="Naslov" class="NASLOV" placeholder="Додај наслов">
            </div>
            <div class="blog">
                <textarea name="Tekst" id="Komentar" cols="1000" rows="10" style="text-indent: 50px;"></textarea>
            </div>
            <div class="objavi">
                <input type="submit" value="ОБЈАВИ" class="DODAJ">
            </div>
        </form>
    </main>
</body>
</html>