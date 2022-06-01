<?php
//Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&family=Zen+Antique+Soft&display=swap" rel="stylesheet">
</head>
    <body>
        <header>
            <div class="naglowek">
                <a href="Strona_Glowna.html"><img src="Logo (1300x450).png"></a>
            </div>
        </header>

        <!-- Navbar -->
        <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
            <!-- Zdjęcie i tytuł -->
            <div class="container-fluid">
                <img src="Znaczek.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
                <a class="navbar-brand">ZŁOTÓWEX</a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
  
                <!-- Przyciski do konkretnych stron -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="logout.php">Wyloguj się</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="login-check">
        <?php
            include('db_connection.php');
            if(isset($_POST['Login'], $_POST['Haslo'])){
            $Login = $_POST['Login'];
            $Haslo = $_POST['Haslo'];

            //to prevent from mysqli injection
            $Login = stripcslashes($Login);
            $Haslo = stripcslashes($Haslo);
            $Login = mysqli_real_escape_string($db, $Login);
            $Haslo = mysqli_real_escape_string($db, $Haslo);

            $sql = "SELECT * FROM Użytkownicy where Login = '$Login' and Haslo = '$Haslo'";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);

            if($count == 1){
                $_SESSION["Login"] = $Login;
                echo "<h1>Udane logowanie</h1>";
            }
            else{
                echo "<h1>Błędny login lub haslo.</h1>";
            }
        }else{
            echo "<h1>Brak loginu lub hasla</h1>";
        }
        ?>
        </div>

        <main class="login-main">
            <?php
                include "db_connection.php";
                if(!$db){
                    die("Connection failed: " . mysqli_connect_error());
                }

                if(isset($_SESSION["Login"])){
                    $sql = "SELECT `id`, `Imie`, `E-mail`, `Tekst` FROM Formularz_kontaktowy";
                    $result = mysqli_query($db, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            echo "id: " . $row["id"]. "<br>" . "Imie: " . $row["Imie"]. "<br>" . "E-mail: " . $row["E-mail"]. "<br>" . "Tekst: " .  $row["Tekst"] . " " . "<br>" . "<br>";
                        }
                    } else {
                        echo "0 results";
                    }

                    mysqli_close($db);
                } else{
                    echo "<a href='Zaloguj_sie.html' class='login-main-link'>Zaloguj się jeszcze raz</a>";
                }
            ?>
        </main>

        <!-- JS Bootstrap script -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>