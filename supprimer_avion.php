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

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_avion'])) {
    $id_avion = $_GET['id_avion'];

    // Supprimer l'avion correspondant à l'ID de la base de données
    $sql = "DELETE FROM bdl_avions WHERE id_avion=$id_avion";

    if ($dbname->query($sql) === TRUE) {
        echo 'L\'avion a été supprimé avec succès.';
    } else {
        echo 'Erreur lors de la suppression de l\'avion : ' . $dbname->error;
    }
} else {
    echo "Identifiant de l'avion non spécifié ou méthode non autorisée.";
}
?>
