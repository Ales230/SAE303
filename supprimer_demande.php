<?php
session_start();

if (!(isset($_SESSION['role']) && $_SESSION['role'] === 'admin')) {
    header('Location: login.php');
    exit();
}

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bdl-ac2fl";

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    throw new Exception("La connexion a échoué : " . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_demande'])) {
    $idDemande = $_POST['id_demande'];

    // Utilisez la méthode de la classe Database pour préparer et exécuter la requête
    $deleteDemandeQuery = "DELETE FROM bdl_demandes WHERE id_demande = ?";
    
    $stmt = $db->prepare($deleteDemandeQuery);
    $stmt->bind_param('i', $idDemande);
    
    if ($stmt->execute()) {
        echo "La demande a été supprimée avec succès.";
    } else {
        echo "Une erreur s'est produite lors de la suppression de la demande : " . $stmt->error;
    }
} else {
    echo "ID de demande non spécifié.";
}
?>
