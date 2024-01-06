<?php
session_start();
$id_adherent = $_SESSION['id_adherent'];

echo $id_adherent;

if (!(isset($_SESSION['role']) && $_SESSION['role'] === 'membre')) {
    header('Location: login.php');
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_adherent = $_POST["id_adherent"];
    header('Location: login.php');
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bdl-ac2fl";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$id_adherent = $_SESSION['id_adherent'];

// Récupérer les demandes existantes pour l'utilisateur connecté
$stmt_demandes = $conn->prepare("SELECT * FROM bdl_demandes WHERE id_adherent = :id_adherent");
$stmt_demandes->bindParam(':id_adherent', $id_adherent);
$stmt_demandes->execute();
$demandes = $stmt_demandes->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les réservations existantes pour l'utilisateur connecté
$stmt_reservations = $conn->prepare("SELECT * FROM bdl_reservations WHERE id_adherent = :id_adherent");
$stmt_reservations->bindParam(':id_adherent', $id_adherent);
$stmt_reservations->execute();
$reservations = $stmt_reservations->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demandes et Réservations de l'Utilisateur</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Demandes et Réservations de l'Utilisateur</h2>

    <h3>Demandes</h3>
    <table>
        <tr>
            <th>ID Demande</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>ID Avion</th>
        </tr>
        <?php foreach ($demandes as $demande) : ?>
            <tr>
                <td><?php echo $demande['id_demande']; ?></td>
                <td><?php echo $demande['debut']; ?></td>
                <td><?php echo $demande['fin']; ?></td>
                <td><?php echo $demande['id_avion']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>Réservations</h3>
    <table>
        <tr>
            <th>ID Réservation</th>
            <th>Date de début</th>
            <th>Date de fin</th>
            <th>ID Avion</th>
        </tr>
        <?php foreach ($reservations as $reservation) : ?>
            <tr>
                <td><?php echo $reservation['id_reservation']; ?></td>
                <td><?php echo $reservation['debut']; ?></td>
                <td><?php echo $reservation['fin']; ?></td>
                <td><?php echo $reservation['id_avion']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
$conn = null;
?>
