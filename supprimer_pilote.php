<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bdl-ac2fl";

$dbname = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($dbname->connect_error) {
    die("Échec de la connexion : " . $dbname->connect_error);
}
session_start();
if (!(isset($_SESSION['role']) && $_SESSION['role'] === 'admin')) {
    header('Location: login.php');
    exit();
}

require_once('database.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_pilote'])) {
    $id_pilote = $_GET['id_pilote'];

    // Supprimer le pilote de la base de données en utilisant son ID
    $sql = "DELETE FROM bdl_pilotes WHERE id_pilote = $id_pilote";
    if ($dbname->query($sql) === TRUE) {
        echo "Le pilote a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du pilote : " . $dbname->error;
    }
} else {
    echo "ID du pilote non spécifié.";
}
?>
