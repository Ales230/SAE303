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
