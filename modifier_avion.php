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
    $id_avion = $_POST['id_avion'];
    $type_avion = $_POST['type_avion'];

    // Valider les données
    if (empty($type_avion)) {
        echo 'Veuillez remplir tous les champs.';
        exit;
    }

    $sql = "UPDATE bdl_avions SET type=? WHERE id_avion=?";
    $stmt = $dbname->prepare($sql);
    
    if ($stmt) {
        $stmt->bind_param("si", $type_avion, $id_avion);
        if ($stmt->execute()) {
            echo 'Les informations de l\'avion ont été mises à jour avec succès.';
        } else {
            echo 'Erreur lors de la mise à jour de l\'avion : ' . $stmt->error;
        }
        $stmt->close();
    } else {
        echo 'Erreur de préparation de la requête : ' . $dbname->error;
    }
} // Ajout de la fermeture de la condition if ($_SERVER['REQUEST_METHOD'] === 'POST')

if (isset($_GET['id_avion'])) {
    $id_avion = $_GET['id_avion'];

    // Récupérer les informations actuelles de l'avion depuis la base de données
    $sql = "SELECT id_avion, type FROM bdl_avions WHERE id_avion=$id_avion";
    $result = $dbname->query($sql);

    if ($result->num_rows > 0) {
        $avion = $result->fetch_assoc();

    } else {
        echo "Aucun avion trouvé avec cet identifiant.";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Modifier un avion</title>
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
<a href ="index.php"class="btn-home"  ><i class="ri-home-2-line"></i></a>
        <h1>Modifier un avion</h1>
    </header>
    <div class="container">
        
            <h1>Modifier un avion</h1>
        <form  class="form_div"action="modifier_avion.php" method="POST">
            <input type="hidden" name="id_avion" value="<?php echo $avion['id_avion']; ?>">
            <label for="type_avion">Type d'avion :</label>
            <input class="field_class"type="text" id="type_avion" name="type_avion" value="<?php echo $avion['type']; ?>" required><br><br>

            <input type="submit" class="submit_class"value="Valider les modifications">
        </form>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <style>
        body {
    background: url(Ressources/jet.jpg) no-repeat;
    background-size:cover;
    background-position-y: -150px;
}
</style>
</body>
</html>



