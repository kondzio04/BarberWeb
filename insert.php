<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<section>


    <?php
include "db-connection.php";


if(isset($_POST['submit']) && !empty($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $insert = mysqli_connect($db, "INSERT INTO 'wiadomosci-jd'('imię', 'email', 'tresc-jd') VALUES ('$name', '$email', '$message') ");
}

?>


</section>




</body>
</html>