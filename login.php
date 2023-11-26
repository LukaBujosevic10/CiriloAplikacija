<?php
session_start();
if(isset($_SESSION["Email"]))
    header("Location: index.php");
include "db.php";
$conn = connect();
if(isset($_POST["Sub"]))
{
    $hash=password_hash($_POST["Password"],PASSWORD_BCRYPT);
    $pas=$_POST["Password"];
    $email=$_POST["Email"];
    $result = $conn->query("SELECT * FROM users WHERE Email='".$email."'");
    echo $result->num_rows;
    if($result->num_rows >0)
    {
        $row=$result->fetch_assoc();
        if(password_verify($pas,$row["Password"])){
            $_SESSION["ID"]=$row["UserID"];
            $_SESSION["Email"]=$row["Email"];
            $_SESSION["Username"]=$row["Username"];
            header('Location: index.php');
        }
    }
    
}
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post" onsubmit="return validateLogin()">
        <input id="Email" type="text" placeholder="Email" name="Email">
        <input id="Password" type="password" placeholder="Password" name="Password">
        <input type="submit" value="Prijavi se" name="Sub">

    </form>
    <script type="text/javascript" src="scripts/validations.js"></script>
</body>
</html>
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="register.css?v=<?php echo time(); ?>">
    <script src="scripts/script.js"></script>
    <title>ПРИЈАВИ СЕ</title>
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
                        <a href="info.html" >ИНФО</a>
                        <a href="login.php" id="active">ПРИЈАВИ СЕ</a>
                        <a href="register.php"  >РЕГИСТРУЈ СЕ</a>
                        
                    </div>
                  </div>
                  
            <a href="index.php" class="navigacioniMeni">ПОЧЕТНА</a>
            <a href="info.html" class="navigacioniMeni">ИНФО</a>
            <a href="login.php"  id="active" class="navigacioniMeni">ПРИЈАВИ СЕ</a>
            <a href="register.php"  class="navigacioniMeni">РЕГИСТРУЈ СЕ</a>
            
        </div>
        </nav>
    </header>
    <main class="glavniDeoStranice">
        <form action="login.php" method="post" id="registerForm" onsubmit="return validateRegistration()">
                   
            <div class="InputEmail">
            <label for="Email">И-МЕЈЛ:</label>
            <input type="email"    class="input" id="Email" name="Email"    placeholder="И-мејл"   required>
            </div>

            <div class="InputSifra">
            <label for="sifra">ШИФРА:</label>
            <input type="password" class="input" name="Password" id="Password"  placeholder="Шифра"    required> 
            </div>
         
            <div class="Posalji">
                <input type="submit" name="Sub" id="dugme" value="ПРИЈАВИ СЕ">
            </div>
        </form>
        
    </main>
    <footer>
        <section class="drustveneMreze">
            <div class="instagram">
                    <div class="slikaInstagrama">
                        <img src="slike/instagram(1) (1).png?v=<?php echo time(); ?>" alt="" class="sl">
                    </div>
                    <div class="nazivInstagrama">
                       <a href="https://www.instagram.com/smart_start_projects/" class="instagram1"> @smart_start_projects</a>
                    </div>
            </div>

            <div class="linkedIn">
                <div class="slikaLinkedIn">
                    <img src="slike/linkedin (1).png?v=<?php echo time(); ?>" alt="" class="sl">
                </div>
                <div class="nazivLiknedIn">
                    <a href="https://www.linkedin.com/search/results/ALL/?keywords=smart_start_projects&origin=SWITCH_SEARCH_VERTICAL&sid=TrU" class="LinkedIn1">@smart_start_projects</a>
                </div>
            </div>

            <div class="email">
                <div class="slikaEmaila">
                    <img src="slike/mail (1).png?v=<?php echo time(); ?>" alt="" class="sl">
                </div>
                <div class="nazivEmaila">
                    <p>smartstartgroup8@gmail.com</p>
                </div>
            </div>
        </section>
    </footer>
    <script type="text/javascript" src="scripts/validations.js"></script>
</body>
</html>