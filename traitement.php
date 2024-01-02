
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Créer une instance de la classe Adherent avec les données du formulaire
    $adherentData = $_POST;
    $adherent = new Adherent($adherentData);

    // Créer une instance de la classe Database et insérer les données
    $db = new Database();
    $insertedId = $db->insertAdherent($adherent); // Obtenez l'ID inséré

    // Redirection vers la page de remerciement avec l'identifiant de l'adhérent
    header("Location: remerciement.php?id=" . urlencode($insertedId));
    exit();
}

class Adherent {
    private $id;
    private $civilite;
    private $nom;
    private $prenom;
    private $date_naissance;
    private $adresse;
    private $code_postal;
    private $ville;
    private $email;
    private $telephone;
    private $activites_demandees;
    private $role = 'membre'; // Valeur par défaut
    
    public function __construct($data) {
        $this->id = uniqid(); // Génère un identifiant unique
        $this->civilite = $data['civilite'];
        $this->nom = $data['nom'];
        $this->prenom = $data['prenom'];
        $this->date_naissance = $data['date_naissance'];
        $this->adresse = $data['numero_rue'] . ', ' . $data['code_postal'] . ' ' . $data['ville'];
        $this->code_postal = $data['code_postal'];
        $this->ville = $data['ville'];
        $this->email = $data['email'];
        $this->telephone = $data['telephone'];
        $this->activites_demandees = isset($data['activites']) ? implode(', ', $data['activites']) : '';
    }
    public function getId() {
        return $this->id;
    }
    public function getCivilite() {
        return $this->civilite;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getDateNaissance() {
        return $this->date_naissance;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getCodePostal() {
        return $this->code_postal;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelephone() {
        return $this->telephone;
    }

    public function getActivitesDemandees() {
        return $this->activites_demandees;
    }
    public function getRole() {
        return $this->role;
    }
}

class FormValidator {
    public static function validateForm($data) {
        $errors = [];

        // Vérification des champs obligatoires
        $requiredFields = ['civilite', 'nom', 'prenom', 'email']; // Champs obligatoires
        foreach ($requiredFields as $field) {
            if (empty($data[$field])) {
                $errors[] = "Le champ '$field' est obligatoire.";
            }
        }

        return $errors;
    }
}

class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "bdl-ac2fl";
    private $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->id = uniqid(); // Génère un identifiant unique

        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function insertAdherent(Adherent $adherent) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO bdl_adherent (id, civilite, nom, prenom, date_naissance, adresse, email, telephone, activites_demandees, role) 
            VALUES (:id, :civilite, :nom, :prenom, :date_naissance, :adresse, :email, :telephone, :activites_demandees, :role)");            

            $stmt->bindParam(':id', $adherent->getId());
            $stmt->bindParam(':civilite', $adherent->getCivilite());
            $stmt->bindParam(':nom', $adherent->getNom());
            $stmt->bindParam(':prenom', $adherent->getPrenom());
            $stmt->bindParam(':date_naissance', $adherent->getDateNaissance());
            $stmt->bindParam(':adresse', $adherent->getAdresse());
            $stmt->bindParam(':email', $adherent->getEmail());
            $stmt->bindParam(':telephone', $adherent->getTelephone());
            $stmt->bindParam(':activites_demandees', $adherent->getActivitesDemandees());
            $stmt->bindParam(':role', $adherent->getRole()); // Utilisation du getter pour 'role'
            $stmt->execute();
            echo "Les données ont été enregistrées avec succès !";
            $insertedId = $this->conn->lastInsertId();
            return $insertedId; // Retournez l'ID inséré
        } catch(PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            return null;
        }
    }
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
