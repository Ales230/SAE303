<?php
session_start();

if (isset($_SESSION["id_adherent"])) {
    $id_adherent = $_SESSION["id_adherent"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bdl-ac2fl";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_avion = $_POST["id_avion"];
        $date_debut = $_POST["date_debut"];
        $date_fin = $_POST["date_fin"];
    
        // Formater les dates dans le format Y-m-d pour la base de données
        $date_debut = date('Y-m-d', strtotime($date_debut));
        $date_fin = date('Y-m-d', strtotime($date_fin));
    
        try {
            // ... (votre traitement existant)
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    
        $conn = null; // Fermeture de la connexion à la base de données
    } else {
        echo "Erreur : Aucune donnée de formulaire reçue.";
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Vérifier si les dates choisies entrent en conflit avec des réservations existantes
        $stmt_check = $conn->prepare("SELECT id_demande FROM bdl_demandes WHERE id_avion = :id_avion AND :date_debut <= fin AND :date_fin >= debut");
        $stmt_check->bindParam(':id_avion', $id_avion);
        $stmt_check->bindParam(':date_debut', $date_debut);
        $stmt_check->bindParam(':date_fin', $date_fin);
        $stmt_check->execute();

        if ($stmt_check->rowCount() > 0) {
            echo "Les dates sélectionnées entrent en conflit avec des réservations existantes.";
        } else {
            // Vérifier s'il existe déjà une demande en cours pour cet utilisateur
            $stmt_check = $conn->prepare("SELECT id_demande FROM bdl_demandes WHERE id_adherent = :id_adherent AND fin >= NOW()");
            $stmt_check->bindParam(':id_adherent', $id_adherent);
            $stmt_check->execute();

            if ($stmt_check->rowCount() > 0) {
                echo "Vous avez déjà une demande en cours. Veuillez attendre qu'elle soit traitée avant d'en soumettre une nouvelle.";
            } else {
                // Générer un identifiant unique pour la nouvelle demande
                $id_demande = uniqid();

                $stmt_insert = $conn->prepare("INSERT INTO bdl_demandes (id_adherent, id_avion, debut, fin) VALUES (:id_adherent, :id_avion, :date_debut, :date_fin)");
                $stmt_insert->bindParam(':id_adherent', $id_adherent);
                $stmt_insert->bindParam(':id_avion', $id_avion);
                $stmt_insert->bindParam(':date_debut', $date_debut);
                $stmt_insert->bindParam(':date_fin', $date_fin);
                $stmt_insert->execute();

                echo "Demande de réservation effectuée avec succès!";
            }
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }

    $conn = null; // Fermeture de la connexion à la base de données
} else {
    // Rediriger l'utilisateur vers la page d'authentification si l'ID adhérent n'est pas défini
    header("Location: login.php");
    exit();
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
        <h1>Félicitations !</h1>
    </header>
    <div class="container">
        
            <h1>Le pilote a été ajouté avec succès.</h1>
        
        
        <!-- Contenu de la page -->

        <!-- Bouton pour revenir à la page précédente -->
        <button class="submit_class" type="submit" form="login_form" onclick="goBack()">Continuer</button>
    </div>

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



