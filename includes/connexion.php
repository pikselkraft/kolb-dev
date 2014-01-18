<?php
$mysqli = new mysqli("localhost", "root", "", "kolb");

/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}

/* Retourne le nom de la base de données courante */
if ($result = $mysqli->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    //printf("La base de données courante est %s.\n", $row[0]);
    $result->close();
}

?>