<?php 
    session_start();
    if(!isset($_SESSION["Email"]))
        header("Location: index.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="info.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="scripts/script.js?v=<?php echo time(); ?>"></script>
    <title>Diskusija</title>
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
                        <a href="#"  id="active">ДИСКУСИЈА</a>
                        <?php 
                            if(!isset($_SESSION["Email"]))
                                echo '<a href="register.php" >РЕГИСТРУЈ СЕ</a>';
                            else echo '<a href="logout.php" >'.$_SESSION["Email"].'</a>'; 
                        ?>
                        
                        
                    </div>
                  </div>
                  
            <a href="index.php" class="navigacioniMeni">ПОЧЕТНА</a>
            <a href="#" class="navigacioniMeni" id="active">ДИСКУСИЈЕ</a>
            <?php 
                            if(!isset($_SESSION["Email"]))
                                echo '<a href="register.php" class="navigacioniMeni">РЕГИСТРУЈ СЕ</a>';
                            else echo '<a href="logout.php" class="navigacioniMeni">'.$_SESSION["Email"].'</a>'; 
                        ?>
            
        </div>
        </nav>
    </header>
    <main class="izgledDiskusije">
        <a href="dodajDiskusiju.php"><input type="image" src="slike/plus-removebg-preview.png" height="50px" width="50px" class="dodaj"></a>
        
        <?php
        include("db.php");
        
        $con = connect();
        $result = $con->query("SELECT d.*, u.Username, COUNT(c.Tekst) as a FROM discussion d LEFT JOIN users u ON d.UserID=u.UserID LEFT JOIN comments c ON d.DiskusijaID = c.DiskusijaID GROUP BY d.DiskusijaID, d.UserID, d.Naslov, d.Datum, d.BrLajkova, d.BrLajkova, d.Tekst, u.Username");
        
        while($row = $result->fetch_assoc()) {
            echo '<div class="margineDiskusije">
            <div class="korisnickoime">
                <p class="ime">'.$row["Username"].'</p>
                <p class="datum">'.$row["Datum"].'</p>
                <div class="NALOV"><p class="naslov">'.$row["Naslov"].'</p></div>
            </div>
            <div class="blog">
                <p class="Lorem">'.$row["Tekst"].'</p>
            </div>
            <div class="LajkIkomentar">
                <div class="lajk">
                    <input type="image" src="slike/lajk.jpg" onclick="PromenaBoje('.$row["DiskusijaID"].')" width="40px" height="40px" class="slikaLajka" id="srce'.$row["DiskusijaID"].'">
                    <b><p class="brojevi" id="broj'.$row["DiskusijaID"].'">'.$row["BrLajkova"].'</p></b>
                </div>
                <div class="komentar">
        
                    <a href="dodajKomentarNaObjavu.php?diskusijaID='.$row["DiskusijaID"].'"><input type="image" src="slike/komentar.jpg" href="" width="40px" height="40px" class="slikaKomentara"></a>
                    <b><p class="brojevi">'.$row["a"].'</p></b>
                </div>
            </div>
        </div>';
        }
        ?>
        

        

                               

                            

    </main>

    
        

    
</body>
</html>