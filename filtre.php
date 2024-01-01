<?php

class FormHandler {
    private $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $formData = $this->sanitizeFormData($_POST);

            if ($this->validateFormData($formData)) {
                if ($this->insertDataIntoDatabase($formData)) {
                    header('Location: formulaire_remerciement.php');
                    exit();
                } else {
                    echo "Erreur lors de l'insertion dans la base de données.";
                }
            } else {
                $this->displayFormWithErrors($formData);
            }
        }
    }
    private function sanitizeFormData($data) {
        // Filtrer et nettoyer les données soumises (éviter les injections)
        // Utilisez filter_var(), htmlspecialchars() ou d'autres fonctions de nettoyage
        // Ici, une démo simple avec htmlspecialchars pour éviter les injections XSS
        $sanitizedData = [];
        foreach ($data as $key => $value) {
            $sanitizedData[$key] = htmlspecialchars($value);
        }
        return $sanitizedData;
    }
    
    private function validateFormData($data) {
        // Valider les données (vérifiez si les champs requis sont remplis, les formats d'email, etc.)
        $requiredFields = ['nom', 'prenom', 'email']; // Champs requis
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                return false; // Un champ requis est vide, donc les données ne sont pas valides
            }
        }
    
        // Validation d'email simple
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return false; // L'email n'est pas valide
        }
    
        return true; // Toutes les validations sont passées avec succès
    }
    
    private function insertDataIntoDatabase($data) {
        // Simuler l'insertion dans la base de données
        // Dans un scénario réel, utilisez une requête SQL avec PDO pour insérer les données
        // Remplacez cette partie par votre logique d'insertion réelle dans la base de données
        $inserted = false; // Indicateur d'insertion
        // Exemple de requête simulée :
        // $query = "INSERT INTO votre_table (nom, prenom, email) VALUES (:nom, :prenom, :email)";
        // $stmt = $this->db->prepare($query);
        // $stmt->execute([
        //     'nom' => $data['nom'],
        //     'prenom' => $data['prenom'],
        //     'email' => $data['email']
        // ]);
        // if ($stmt->rowCount() > 0) {
        //     $inserted = true;
        // }
        // Simulation : retourne true si l'insertion est réussie, sinon false
        return $inserted;
    }
    
    private function displayFormWithErrors($data) {
        // Afficher le formulaire avec des messages d'erreur pour les champs invalides
        // Pré-remplir les champs du formulaire avec les données saisies précédemment
        // Affichez également les messages d'erreur pour les champs invalides
        // Par exemple, utilisez $data['nom'], $data['prenom'], etc. pour pré-remplir les champs
        // et affichez les erreurs s'il y en a
        // Vous pouvez utiliser des variables pour stocker les messages d'erreur et les afficher dans le formulaire
    }
// Connexion à la base de données
$dbConnection = new PDO('mysql:host=localhost;dbname=VOTRE_BASE_DE_DONNEES', 'root'); // Mettez vos propres identifiants

// Création de l'instance du gestionnaire de formulaire
$formHandler = new FormHandler($dbConnection);

// Traitement de la soumission du formulaire
$formHandler->handleFormSubmission();