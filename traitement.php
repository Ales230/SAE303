<?php
class FormDataHandler {
    public function displayFormData() {
        echo "<!DOCTYPE html>";
        echo "<html lang='fr'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";
        echo "<title>Résultat du formulaire</title>";
        echo "</head>";
        echo "<body>";
        echo "<h1>Résultat du formulaire</h1>";

        // Affichage des données du formulaire
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<p>Civilité : " . $_POST['civilite'] . "</p>";
            echo "<p>Nom : " . $_POST['nom'] . "</p>";
            echo "<p>Prénom : " . $_POST['prenom'] . "</p>";
            // Afficher les autres champs de la même manière
        }

        echo "</body>";
        echo "</html>";
    }

    public function validateFormData($formData) {
        $errors = [];

        // Vérification des champs obligatoires
        $requiredFields = ['nom', 'prenom', 'email'];
        foreach ($requiredFields as $field) {
            if (empty($formData[$field])) {
                $errors[] = "Le champ $field est obligatoire.";
            }
        }

        // Vérification du numéro de portable
        $telPortable = $formData['tel_portable'];
        if (!empty($telPortable) && !preg_match('/^\+?\d{6,}$/', $telPortable)) {
            $errors[] = "Le numéro de portable est invalide.";
        }

        // Vérification de l'adresse email
        $email = $formData['email'];
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'adresse email est invalide.";
        }

        return $errors;
    }
}

// Gestion de la soumission du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclusion de la classe FormDataHandler
    include 'FormDataHandler.php';

    // Création d'une instance de FormDataHandler
    $formDataHandler = new FormDataHandler();

    // Validation des données du formulaire
    $errors = $formDataHandler->validateFormData($_POST);

    if (empty($errors)) {
        // Si aucune erreur, afficher les données saisies dans le formulaire
        $formDataHandler->displayFormData();
    } else {
        // S'il y a des erreurs, afficher les messages d'erreur
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
?>
