<?php
session_start();

require_once('database.php');
require_once('adherent.php');
require_once('pilote.php');
require_once('avion.php');

// Initialisez la connexion à la base de données (vous devez déjà avoir cette partie)
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bdl-ac2fl";

$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    throw new Exception("Connection failed: " . $db->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les données du formulaire
    $idAdherent = $_POST['id_adherent'];
    $idPilote = $_POST['id_pilote'];
    $idAvion = $_POST['id_avion'];
    $dateDebut = $_POST['date_debut'];
    $dateFin = $_POST['date_fin'];

    // Validez les données
    $errors = array();

    // Créez une instance de mysqli pour la classe Adherent
    $adherentDb = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    // Validez l'existence de l'adhérent
    $adherent = new Adherent($data, $adherentDb);
    if (!$adherent->findAdherentById($idAdherent)) {
        $errors[] = "L'adhérent avec l'ID $idAdherent n'existe pas.";
    }


    // Validez l'existence de l'avion
    $avion = new Avion($db);
    if (!$avion->findAvionById($idAvion)) {
        $errors[] = "L'avion avec l'ID $idAvion n'existe pas.";
    }



    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        $checkColumnsQuery = "SHOW COLUMNS FROM bdl_reservations WHERE Field IN ('debut', 'fin')";
        $resultColumns = $db->query($checkColumnsQuery);
    
        if ($resultColumns->num_rows == 2) {
            $sql = "INSERT INTO bdl_reservations (id_adherent, id_pilote, id_avion, debut, fin) 
                    VALUES ('$idAdherent', '$idPilote', '$idAvion', '$dateDebut', '$dateFin')";
    
            if ($db->query($sql) === TRUE) {
                echo "Réservation créée avec succès";
            } else {
                echo "Erreur lors de la création de la réservation : " . $db->error;
            }
        } else {
            echo "Les colonnes date_debut et date_fin n'existent pas dans la table bdl_reservations.";
        }
    }
}
$sqlDemandes = "SELECT * FROM bdl_demandes";
$resultDemandes = $db->query($sqlDemandes);
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles/formulaire_admin.css">
    <title>Tableau de synthèse</title>
</head>
<body>
<header>
        <h1>Formulaire administrateur</h1>
</header>
<main>
<div>
<h2>Liste des demandes</h2>
<table>
    <tr>
        <th>ID Demande</th>
        <th>ID Adhérent</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Nom de l'Avion</th> <!-- Modification de l'en-tête pour afficher le nom -->
    </tr>
    <?php
    if ($resultDemandes->num_rows > 0) {
        while ($rowDemande = $resultDemandes->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $rowDemande['id_demande'] . "</td>";
            echo "<td>" . $rowDemande['id_adherent'] . "</td>";
            echo "<td>" . $rowDemande['debut'] . "</td>";
            echo "<td>" . $rowDemande['fin'] . "</td>";

            // Récupérer le nom de l'avion correspondant à l'ID
            $avionId = $rowDemande['id_avion'];
            $sqlNomAvion = "SELECT type FROM bdl_avions WHERE id_avion = $avionId";
            $resultNomAvion = $db->query($sqlNomAvion);
            
            if ($resultNomAvion && $resultNomAvion->num_rows > 0) {
                $rowNomAvion = $resultNomAvion->fetch_assoc();
                echo "<td>" . $rowNomAvion['type'] . "</td>"; // Afficher le nom de l'avion
            } else {
                echo "<td>Avion inconnu</td>"; // Afficher un message si l'avion est introuvable
            }
            
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Aucune demande trouvée.</td></tr>";
    }
    ?>
</table>
</div>
<div class="nouv_reserv">
<h2>Nouvelle Réservation</h2>
<form method="post" action="">
    <!-- Sélectionnez l'adhérent -->
    <label for="id_adherent">ID Adhérent :</label>
    <input type="text" id="id_adherent" name="id_adherent" required>

    <!-- Sélectionnez le pilote -->
    <label for="id_pilote">Pilote :</label>
    <select name="id_pilote" required>
        <?php
        $sqlPilotes = "SELECT * FROM bdl_pilotes";
        $resultPilotes = $db->query($sqlPilotes);

        while ($rowPilote = $resultPilotes->fetch_assoc()) {
            echo "<option value='{$rowPilote['id_pilote']}'>{$rowPilote['nom']} {$rowPilote['prenom']}</option>";
        }
        ?>
    </select>

    <!-- Sélectionnez l'avion -->
    <label for="id_avion">Avion :</label>
    <select name="id_avion" required>
        <?php
        $sqlAvions = "SELECT * FROM bdl_avions";
        $resultAvions = $db->query($sqlAvions);

        while ($rowAvion = $resultAvions->fetch_assoc()) {
            echo "<option value='{$rowAvion['id_avion']}'>{$rowAvion['type']}</option>";
        }
        ?>
    </select>

    <!-- Sélectionnez les dates -->
    <label for="date_debut">Date de début :</label>
    <input type="date" id="date_debut" name="date_debut" required>

    <label for="date_fin">Date de fin :</label>
    <input type="date" id="date_fin" name="date_fin" required>

    <!-- Bouton de soumission -->
    <input type="submit" name="reserve" value="Réserver">
</form>
<?php

// Construction du tableau de synthèse des données essentielles insérées dans la base
$sqlTableauSynthese = "SELECT * FROM bdl_reservations"; 

$resultTableauSynthese = $db->query($sqlTableauSynthese);
?>
</div>

    
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>


<div class="tab_synthese">
<h2>Tableau de synthèse des réservations</h2>
<table>
    <tr>
        <th>ID Réservation</th>
        <th>ID Adhérent</th>
        <th>ID Pilote</th>
        <th>ID Avion</th>
        <th>Date de début</th>
        <th>Date de fin</th>
    </tr>
    <?php
    if ($resultTableauSynthese->num_rows > 0) {
        while ($row = $resultTableauSynthese->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_reservation'] . "</td>";
            echo "<td>" . $row['id_adherent'] . "</td>";
            echo "<td>" . $row['id_pilote'] . "</td>";
            echo "<td>" . $row['id_avion'] . "</td>";
            echo "<td>" . $row['debut'] . "</td>";
            echo "<td>" . $row['fin'] . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>Aucune réservation trouvée.</td></tr>";
    }
    ?>
</table>
</div>
</main>
</body>
</html>
