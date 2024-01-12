<?php
session_start();

if (!(isset($_SESSION['role']) && $_SESSION['role'] === 'membre')) {
    header('Location: login.php');
    exit();
}

// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdl-ac2fl"; // Remplacez par le nom de votre base de données
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Récupérer les données de l'adhérent depuis la session
$adherent_id = isset($_SESSION['id_adherent']) ? $_SESSION['id_adherent'] : '';

// Récupérer les données actuelles de l'adhérent depuis la base de données
$stmt = $conn->prepare("SELECT * FROM bdl_adherent WHERE id_adherent = :adherent_id");
$stmt->bindParam(':adherent_id', $adherent_id);
$stmt->execute();
$adherent = $stmt->fetch(PDO::FETCH_ASSOC);

// Vérifier si des données ont été envoyées via un formulaire de modification
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_email = $_POST['email'];
    $new_telephone = $_POST['telephone'];
    $new_adresse = $_POST['adresse'];

    // Mettre à jour les données de l'adhérent dans la base de données
    $update_stmt = $conn->prepare("UPDATE bdl_adherent SET email = :new_email, telephone = :new_telephone, adresse = :new_adresse WHERE id_adherent = :adherent_id");
    $update_stmt->bindParam(':new_email', $new_email);
    $update_stmt->bindParam(':new_telephone', $new_telephone);
    $update_stmt->bindParam(':new_adresse', $new_adresse);
    $update_stmt->bindParam(':adherent_id', $adherent_id);
    $update_stmt->execute();

    // Mettre à jour les données de l'adhérent dans la session
    $_SESSION['email'] = $new_email;
    $_SESSION['telephone'] = $new_telephone;
    $_SESSION['adresse'] = $new_adresse;

    // Actualiser les données affichées
    $adherent['email'] = $new_email;
    $adherent['telephone'] = $new_telephone;
    $adherent['adresse'] = $new_adresse;
    $message = "Les modifications ont été enregistrées avec succès !";

// Récupérer les demandes en cours avec le type d'avion correspondant
$stmt_demandes = $conn->prepare("SELECT d.id_demande, d.debut, d.fin, a.type
    FROM bdl_demandes d
    INNER JOIN bdl_avions a ON d.id_avion = a.id_avion
    WHERE d.id_adherent = :adherent_id");
$stmt_demandes->bindParam(':adherent_id', $adherent_id);
$stmt_demandes->execute();
$demandes_en_cours = $stmt_demandes->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les réservations de l'adhérent connecté avec les détails du pilote et de l'avion, y compris le numéro de licence du pilote
$stmt_reservations = $conn->prepare("SELECT r.id_reservation, p.nom AS nom_pilote, p.prenom AS prenom_pilote, p.numero_licence, a.type AS type_avion, r.debut, r.fin
    FROM bdl_reservations r
    INNER JOIN bdl_pilotes p ON r.id_pilote = p.id_pilote
    INNER JOIN bdl_avions a ON r.id_avion = a.id_avion
    WHERE r.id_adherent = :adherent_id");
$stmt_reservations->bindParam(':adherent_id', $adherent_id);
$stmt_reservations->execute();
$reservations_adherent = $stmt_reservations->fetchAll(PDO::FETCH_ASSOC);



}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="Styles/profil.css">
    <link rel="icon" href="Ressources/AC2FL.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
</head>
<body>
<header>
    
        <a href ="index.php"class="btn-home"  ><i class="ri-home-2-line"></i></a>
        <h1>Mon profil</h1>
        
        
    </header>
<main>
    <form method="post" action="profil.php">
        <table>
            <tr>
                <th>ID Adhérent</th>
                <td><?php echo $adherent['id_adherent']; ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="text" name="email" value="<?php echo $adherent['email']; ?>"></td>
            </tr>
            <tr>
                <th>Numéro de téléphone</th>
                <td><input type="text" name="telephone" value="<?php echo $adherent['telephone']; ?>"></td>
            </tr>
            <tr>
                <th>Adresse</th>
                <td><textarea name="adresse"><?php echo $adherent['adresse']; ?></textarea></td>
            </tr>
            <!-- Ajouter les informations supplémentaires -->
            <tr>
                <th>Civilité</th>
                <td><?php echo $adherent['civilite']; ?></td>
            </tr>
            <tr>
                <th>Nom</th>
                <td><?php echo $adherent['nom']; ?></td>
            </tr>
            <tr>
                <th>Prénom</th>
                <td><?php echo $adherent['prenom']; ?></td>
            </tr>
            <tr>
                <th>Date de naissance</th>
                <td><?php echo $adherent['date_naissance']; ?></td>
            </tr>
            <!-- Fin des informations supplémentaires -->
        </table>
        <input type="submit" value="Enregistrer les modifications">
    </form>
    <!-- Affichage du message -->
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
    <h3>Demandes en cours</h3>
<table border="1">
    <thead>
        <tr>
            <th>ID Demande</th>
            <th>Date Début</th>
            <th>Date Fin</th>
            <th>Type d'Avion</th>
            <!-- Ajoutez d'autres colonnes si nécessaire -->
        </tr>
    </thead>
    <tbody>
        <?php if (isset($demandes_en_cours) && is_array($demandes_en_cours) && count($demandes_en_cours) > 0) : ?>
            <?php foreach ($demandes_en_cours as $demande) : ?>
                <tr>
                    <td><?php echo $demande['id_demande']; ?></td>
                    <td><?php echo $demande['debut']; ?></td>
                    <td><?php echo $demande['fin']; ?></td>
                    <td><?php echo $demande['type']; ?></td>
                    <!-- Afficher d'autres colonnes selon vos besoins -->
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="4">Aucune demande en cours.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<h3>Réservations de l'adhérent</h3>
<table border="1">
    <thead>
        <tr>
            <th>ID Réservation</th>
            <th>Nom du Pilote</th>
            <th>Prénom du Pilote</th>
            <th>Immatriculation du pilote</th>
            <th>Type d'Avion</th>
            <th>Date Début</th>
            <th>Date Fin</th>
            <!-- Ajoutez d'autres colonnes si nécessaire -->
        </tr>
    </thead>
    <tbody>
        <?php if (isset($reservations_adherent) && is_array($reservations_adherent) && count($reservations_adherent) > 0) : ?>
            <?php foreach ($reservations_adherent as $reservation) : ?>
                <tr>
                    <td><?php echo $reservation['id_reservation']; ?></td>
                    <td><?php echo $reservation['nom_pilote']; ?></td>
                    <td><?php echo $reservation['prenom_pilote']; ?></td>
                    <td><?php echo $reservation['numero_licence']; ?></td>
                    <td><?php echo $reservation['type_avion']; ?></td>
                    <td><?php echo $reservation['debut']; ?></td>
                    <td><?php echo $reservation['fin']; ?></td>
                    <!-- Afficher d'autres colonnes selon vos besoins -->
                </tr>
            <?php endforeach; ?>
        <?php else : ?>
            <tr>
                <td colspan="7">Aucune réservation trouvée.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


</main>
</body>
</html>

