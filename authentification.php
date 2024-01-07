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
                header("Location: formulaire_membre.php");
                exit();
            } else {
                echo "Accès non autorisé pour cet utilisateur.";
            }
        } else {
            echo "Identifiants incorrects";
        }
    } catch(PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
