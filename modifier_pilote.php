<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bdl-ac2fl";

$dbname = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($dbname->connect_error) {
    die("Échec de la connexion : " . $dbname->connect_error);
}
require_once("database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez et récupérez les données du formulaire
    $id_pilote = $_POST['id_pilote'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numero_licence = $_POST['numero_licence'];

    // Vérifiez la validité des données
    if (empty($nom) || empty($prenom) || empty($numero_licence)) {
        echo 'Veuillez remplir tous les champs obligatoires.';
        exit;
    }

    // Mettez à jour les données du pilote dans la base de données
    $sql = "UPDATE bdl_pilotes SET nom='$nom', prenom='$prenom', numero_licence='$numero_licence' WHERE id_pilote=$id_pilote";
    $result = $dbname->query($sql);

    // Vérifiez le résultat de la mise à jour
    if ($result === TRUE) {
        echo 'Les informations du pilote ont été mises à jour avec succès.';
    } else {
        echo 'Erreur lors de la mise à jour du pilote : ' . $dbname->error;
    }
}

if(isset($_GET['id_pilote'])) {
    $id_pilote = $_GET['id_pilote'];

    // Récupérez les informations actuelles du pilote depuis la base de données
    $sql = "SELECT id_pilote, nom, prenom, numero_licence FROM bdl_pilotes WHERE id_pilote=$id_pilote";
    $result = $dbname->query($sql);

    if ($result->num_rows > 0) {
        $pilote = $result->fetch_assoc();
?>
        
<?php
    } else {
        echo "Aucun pilote trouvé avec cet identifiant.";
    }
} else {
    echo "";
}
?>
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
        echo "";
    } else {
        echo "Une erreur s'est produite lors de la suppression de la demande : " . $stmt->error;
    }
} else {
    echo "ID de demande non spécifié.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/authentification.css">
    <link rel="icon" href="Ressources/AC2FL.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Félicitations !</title>
    <style>
        body {
            font-family: 'Saira Extra Condensed', sans-serif;
            letter-spacing: 1px;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            margin: 0;
            padding: 0;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
<header>
        <h1>Modifier un pilote</h1>
    </header>
    <div class="container">
        
    <form action="modifier_pilote.php" method="POST">
            <input type="hidden" name="id_pilote" value="<?php echo $pilote['id_pilote']; ?>">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $pilote['nom']; ?>" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $pilote['prenom']; ?>" required><br><br>

            <label for="numero_licence">Numéro de licence :</label>
            <input type="text" id="numero_licence" name="numero_licence" value="<?php echo $pilote['numero_licence']; ?>" required><br><br>

            <input type="submit" value="Modifier le pilote">
        </form>
    <style>
        body {
    background: url(Ressources/jet.jpg) no-repeat;
    background-size:cover;
    background-position-y: -150px;
}
</style>
</body>
</html>



