<?php
require_once("database.php");

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bdl-ac2fl";

$dbname = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

session_start();
if (!(isset($_SESSION['role']) && $_SESSION['role'] === 'admin')) {
    header('Location: login.php');
    exit();
}

require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $type_avion = $_POST['type_avion'];

    // Valider les données
    if (empty($type_avion)) {
        echo 'Veuillez remplir tous les champs.';
        exit;
    }

    // Insérer les données dans la table des avions
    $sql = "INSERT INTO bdl_avions (type) VALUES ('$type_avion')";
    if ($dbname->query($sql) === TRUE) {
        echo 'L\'avion a été ajouté avec succès.';
    } else {
        echo 'Erreur lors de l\'ajout de l\'avion : ' . $dbname->error;
    }
}
?>
