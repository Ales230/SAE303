<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdl-ac2fl";
$db = new mysqli($servername, $username, $password, $dbname);

// Vérifie si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupère les données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numero_licence = $_POST['numero_licence'];

    // Vérifie la validité des données
    if (empty($nom) || empty($prenom) || empty($numero_licence)) {
        echo 'Veuillez remplir tous les champs obligatoires.';
        exit;
    }

    // Insère les données dans la base de données
    $sql = "INSERT INTO bdl_pilotes (nom, prenom, numero_licence)
    VALUES ('$nom', '$prenom', '$numero_licence');";
    $result = $db->query($sql);

    // Vérifie le résultat de l'insertion
    if ($result === TRUE) {
        echo 'Le pilote a été ajouté avec succès.';
    } else {
        echo 'Erreur lors de l\'ajout du pilote : ' . $db->error;
    }
}
?>
