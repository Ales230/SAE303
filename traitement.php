
<?php
require_once("adherent.php");
require_once("formvalidator.php");
require_once("database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Créer une instance de la classe Database
    $db = new Database();

    // Créer une instance de la classe Adherent avec les données du formulaire et l'instance de Database
    $adherentData = $_POST;
    $adherent = new Adherent($adherentData, $db);

    // Créer une instance de la classe Database et insérer les données
    $db = new Database();
    $insertedId = $db->insertAdherent($adherent); // Obtenez l'ID inséré

    // Redirection vers la page de remerciement avec l'identifiant de l'adhérent
    header("Location: remerciement.php?id_adherent=" . $insertedId);
    exit();
}




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $validator = new FormValidator();
    $errors = $validator->validateForm($_POST);

    if (empty($errors)) {
        $db = new Database();
        $inserted = $db->insertData($_POST);

        if ($inserted) {
            header("Location: remerciement.php");
            exit();
        }
    } else {
        foreach ($errors as $error) {
            echo '<p style="color: red;">' . $error . '</p>';
        }

        include('index.php'); // Inclure le fichier de formulaire
    }
}

?>
