<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="message.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <section class="main-message">





    <?php
        include "db-connection.php";


        if(isset($_POST['login'], $_POST['hasło'])){
            $username=$_POST['login'];
            $password=$_POST['hasło'];

            $username=stripcslashes($username);
            $password=stripcslashes($password);


            $sql="SELECT * FROM użytkownicy where login='$username' and hasło='$password'";
            $result=mysqli_query($db, $sql);
            $row = mysqli_fetch_array($result);
            $count = mysqli_num_rows($result);

            if($count == 1){
                $_SESSION["Login"] = $Login;
                echo "<h1>Udane logowanie</h1>";
            }
            else{
                echo "<h1>Błędny login lub haslo.</h1>";
            }
        }


    ?>        


    </section>

    <section>

    <?php

include "db-connection.php";

$sql="SELECT `id`, `imię`, `email`, `tresc-jd` FROM `wiadomosci-jd`";
$result=mysqli_query($db, $sql);

if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo "id: ".$row["id"]. " Name: ".$row["imię"]. " Email: ".$row["email"]. " Text: ".$row["tresc-jd"]. "<br>";
    }
} else{
    echo "Brak danych";
}
mysqli_close($db);

?>
<a href="logout.php">wyloguj</a>
    </section>

    
</body>
</html>