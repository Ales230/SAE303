<?php

$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "bdl-ac2fl";

$dbname = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($dbname->connect_error) {
    die("Échec de la connexion : " . $dbname->connect_error);
}
require_once("database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez et récupérez les données du formulaire
    $id_pilote = $_POST['id_pilote'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $numero_licence = $_POST['numero_licence'];

    // Vérifiez la validité des données
    if (empty($nom) || empty($prenom) || empty($numero_licence)) {
        echo 'Veuillez remplir tous les champs obligatoires.';
        exit;
    }

    // Mettez à jour les données du pilote dans la base de données
    $sql = "UPDATE bdl_pilotes SET nom='$nom', prenom='$prenom', numero_licence='$numero_licence' WHERE id_pilote=$id_pilote";
    $result = $dbname->query($sql);

    // Vérifiez le résultat de la mise à jour
    if ($result === TRUE) {
        echo 'Les informations du pilote ont été mises à jour avec succès.';
    } else {
        echo 'Erreur lors de la mise à jour du pilote : ' . $dbname->error;
    }
}

if(isset($_GET['id_pilote'])) {
    $id_pilote = $_GET['id_pilote'];

    // Récupérez les informations actuelles du pilote depuis la base de données
    $sql = "SELECT id_pilote, nom, prenom, numero_licence FROM bdl_pilotes WHERE id_pilote=$id_pilote";
    $result = $dbname->query($sql);

    if ($result->num_rows > 0) {
        $pilote = $result->fetch_assoc();
?>
        <h2>Modifier un pilote</h2>
        <form action="modifier_pilote.php" method="POST">
            <input type="hidden" name="id_pilote" value="<?php echo $pilote['id_pilote']; ?>">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $pilote['nom']; ?>" required><br><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?php echo $pilote['prenom']; ?>" required><br><br>

            <label for="numero_licence">Numéro de licence :</label>
            <input type="text" id="numero_licence" name="numero_licence" value="<?php echo $pilote['numero_licence']; ?>" required><br><br>

            <input type="submit" value="Modifier le pilote">
        </form>
<?php
    } else {
        echo "Aucun pilote trouvé avec cet identifiant.";
    }
} else {
    echo "";
}
?>
