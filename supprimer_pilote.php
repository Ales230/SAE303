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
<?php
session_start();

// Configuration de la connexion à la base de données (à remplir avec vos informations)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdl-ac2fl";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_adherent = $_POST["id_adherent"];
    $email = $_POST["email"];

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM bdl_adherent WHERE id_adherent = :id_adherent AND email = :email");
        $stmt->bindParam(':id_adherent', $id_adherent);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $utilisateur_enregistre = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur_enregistre) {
            $_SESSION['role'] = $utilisateur_enregistre['role']; 
            $_SESSION['id_adherent'] = $utilisateur_enregistre['id_adherent']; // Enregistrez l'ID de l'adhérent en session

            // Vérifier le rôle de l'utilisateur pour la redirection
            if ($utilisateur_enregistre['role'] === 'admin') {
                // Redirection vers la page formulaire_admin.php si l'utilisateur est admin
                header("Location: formulaire_admin.php");
                exit();
            } elseif ($utilisateur_enregistre['role'] === 'membre') {
                // Redirection vers la page formulaire_membre.php si l'utilisateur est membre
                header("Location: profil.php");
                exit();
            } else {
                echo "Accès non autorisé pour cet utilisateur.";
            }
        } else {
            echo "";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
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
    <title>Oups !</title>
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
        <h1>Félicitations !</h1>
    </header>
    <div class="container">
        
            <h1>Le pilote a été supprimé avec succès.</h1>
        
        
        <!-- Contenu de la page -->

        <!-- Bouton pour revenir à la page précédente -->
        <button class="submit_class" type="submit" form="login_form" onclick="goBack()">Revenir en arrière</button>
    </div>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <style>
        body {
    background: url(Ressources/avion_crash.jpg) no-repeat;
    background-size:cover;
    background-position-y: -150px;
}
</style>
</body>
</html>

