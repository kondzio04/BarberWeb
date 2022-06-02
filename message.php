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