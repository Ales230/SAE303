<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation d'adhésion</title>
</head>
<body>
    <h1>Confirmation d'adhésion</h1>
    <p>Merci pour votre adhésion. Voici les informations que vous avez saisies :</p>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<p><strong>Civilité:</strong> " . htmlspecialchars($_POST['civilite']) . "</p>";
        echo "<p><strong>Nom:</strong> " . htmlspecialchars($_POST['nom']) . "</p>";
        echo "<p><strong>Prénom:</strong> " . htmlspecialchars($_POST['prenom']) . "</p>";
        echo "<p><strong>Date de naissance:</strong> " . htmlspecialchars($_POST['date_naissance']) . "</p>";
        echo "<p><strong>Adresse:</strong> " . htmlspecialchars($_POST['numero_rue']) . ", " . htmlspecialchars($_POST['code_postal']) . " " . htmlspecialchars($_POST['ville']) . "</p>";
        echo "<p><strong>Situation familiale:</strong> " . htmlspecialchars($_POST['situation_familiale']) . "</p>";
        echo "<p><strong>Date de début:</strong> " . htmlspecialchars($_POST['date_debut']) . "</p>";
        echo "<p><strong>Date de fin:</strong> " . htmlspecialchars($_POST['date_fin']) . "</p>";
        echo "<p><strong>Email:</strong> " . htmlspecialchars($_POST['email']) . "</p>";
        echo "<p><strong>Téléphone portable:</strong> " . htmlspecialchars($_POST['telephone']) . "</p>";
        echo "<p><strong>Nombre d'enfants mineurs:</strong> " . htmlspecialchars($_POST['enfants_mineurs']) . "</p>";
        echo "<p><strong>Nombre d'enfants majeurs:</strong> " . htmlspecialchars($_POST['enfants_majeurs']) . "</p>";
        echo "<p><strong>Parents à charge (cause du handicap):</strong> " . htmlspecialchars($_POST['parents_handicapes']) . "</p>";        
        if(isset($_POST['activites'])) {
            echo "<p><strong>Activités demandées:</strong> " . implode(', ', $_POST['activites']) . "</p>";
        }
    }
   
    if(isset($_GET['id_adherent'])) {
        $insertedId = $_GET['id_adherent'];
        // Afficher l'identifiant de l'adhérent
        echo "<p>Votre numéro d'adhérent est : " . htmlspecialchars($insertedId) . "</p>";
        
    }
    ?>
    
</body>
</html>
