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
?>
        <h2>Modifier un avion</h2>
        <form action="modifier_avion.php" method="POST">
            <input type="hidden" name="id_avion" value="<?php echo $avion['id_avion']; ?>">
            <label for="type_avion">Type d'avion :</label>
            <input type="text" id="type_avion" name="type_avion" value="<?php echo $avion['type']; ?>" required><br><br>

            <input type="submit" value="Modifier l'avion">
        </form>
<?php
    } else {
        echo "Aucun avion trouvé avec cet identifiant.";
    }
} else {
    echo "";
}
?>
