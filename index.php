<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="home.css">
    <title>Pocetna</title>
    <script src="scripts/script.js"></script>
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
                        <a href="#" id="active">ПОЧЕТНА</a>
                        <?php 
                            if(!isset($_SESSION["Email"])){
                                echo '<a class="navigacioniMeni" href="login.php">ПРИЈАВИ СЕ</a><a href="register.php"  class="navigacioniMeni" >РЕГИСТРУЈ СЕ</a>'; 
                            }else{
                                echo '<a class="navigacioniMeni" href="disscusion.php">ДИСКУСИЈЕ</a><a href="logout.php"  class="navigacioniMeni" >'.$_SESSION["Username"].'</a>';
                            }
                        ?>
                        <a href="register.php"  >РЕГИСТРУЈ СЕ</a>
                        
                    </div>
                  </div>
                  
            <a href="#" id="active" class="navigacioniMeni" >ПОЧЕТНА</a>
            <?php 
                            if(!isset($_SESSION["Email"])){
                                echo '<a class="navigacioniMeni" href="login.php">ПРИЈАВИ СЕ</a><a href="register.php"  class="navigacioniMeni" >РЕГИСТРУЈ СЕ</a>'; 
                            }else{
                                echo '<a class="navigacioniMeni" href="disscusion.php">ДИСКУСИЈЕ</a><a href="logout.php"  class="navigacioniMeni" >'.$_SESSION["Email"].'</a>';
                            }
                        ?>
            
            
        </div>
        </nav>
    </header>
    <main class="glavnideostranice">
        <div class="recenica">
            <p >С </p>
            <p >ћирилицом</p>
            <p >кроз време</p>
        </div>
        
    </main>
</body>
</html>