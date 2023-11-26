<?php
    session_start();
    if(!isset($_SESSION["Email"]) || !isset($_GET["diskusijaID"]))
        header("Location: disscusion.php");
    include("db.php");    
    $con = connect();
    if(isset($_POST["Sadrzaj"]))
    {
        $con->query("INSERT INTO comments VALUES (NULL, ".$_GET["diskusijaID"].",'".$_SESSION["ID"]."','".$_POST["Sadrzaj"]."', 0)");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dodajKomentarNaObjavu.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="scripts/script.js"></script>
    <title>Dodaj Komentar</title>
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
                        <a href="disscusion.php"  id="active">ДИСКУСИЈА</a>
                        <?php echo '<a href="logout.php">'.$_SESSION["Email"].'</a>';?>
                        
                    </div>
                  </div>
                  
            <a href="index.php" class="navigacioniMeni">ПОЧЕТНА</a>
            <a href="disscusion.php" class="navigacioniMeni" id="active">ДИСКУСИЈА</a>
            <?php echo '<a href="logout.php" class="navigacioniMeni">'.$_SESSION["Email"].'</a>';?>
            
        </div>
        </nav>
    </header>
    <main>
        <h1>ДОДАЈ КОМЕНТАР</h1>
        <form class="margineObjave" action="dodajKomentarNaObjavu.php?diskusijaID=<?php echo $_GET["diskusijaID"]?>" method="POST">
            <div class="korisnickoime">
                <p class="ime"><?php echo $_SESSION["Username"]?></p>
            </div>
            
            <div class="blog">
                <textarea name="Sadrzaj" id="Komentar" cols="1000" rows="7"></textarea>
            </div>
            <div class="objavi">
                <input type="submit" value="ОБЈАВИ" class="DODAJ">
            </div>
        </form>

                    <h2>ДРУГИ КОМЕНТАРИ</h2>
        <?php 
            $result = $con->query("SELECT comments.*, users.Username FROM comments, users WHERE users.UserID = comments.UserID AND DiskusijaID='".$_GET["diskusijaID"]."'");
            while($row = $result->fetch_assoc()) {
                echo '<div class="margineDiskusije">
                <div class="korisnickoime">
                    <p class="ime">'.$row["Username"].'</p>
                </div>
                <div class="blog">
                    <p class="Lorem">'.$row["Tekst"].'</p>
                </div>
                <div class="LajkIkomentar">
                    <div class="lajk">
                        <input type="image" src="slike/lajk.jpg" onclick="PromenaBoje2('.$row["CommentID"].')" width="40px" height="40px" class="slikaLajka" id="srce'.$row["CommentID"].'">
                        <b><p class="brojevi" id="broj'.$row["CommentID"].'">'.$row["BrLajkova"].'</p></b>
                    </div>
                    <div class="komentar">
                    </div>    
                </div>
            </div>';
            }
        ?>
        
    </main>
</body>
</html>