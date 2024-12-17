<?php
include_once './Modele/Database.php';

class Congressiste
{
    private $id;
    private $petit_dej;
    private $nom_congressiste;
    private $adresse;
    private $codepostal;
    private $date_inscription;
    private $preference_hotel;
    private $id_organisme;
    private $id_hotel;
    private $id_session;

    public function __construct() {}
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPetitDej()
    {
        return $this->petit_dej;
    }

    public function setPetitDej($petit_dej)
    {
        $this->petit_dej = $petit_dej;
    }

    public function getNomCongressiste()
    {
        return $this->nom_congressiste;
    }

    public function setNomCongressiste($nom_congressiste)
    {
        $this->nom_congressiste = $nom_congressiste;
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function getCodePostal()
    {
        return $this->codepostal;
    }

    public function setCodePostal($codepostal)
    {
        $this->codepostal = $codepostal;
    }

    public function getDateInscription()
    {
        return $this->date_inscription;
    }

    public function setDateInscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;
    }

    public function getPreferenceHotel()
    {
        return $this->preference_hotel;
    }

    public function setPreferenceHotel($preference_hotel)
    {
        $this->preference_hotel = $preference_hotel;
    }

    public function getIdOrganisme()
    {
        return $this->id_organisme;
    }

    public function setIdOrganisme($id_organisme)
    {
        $this->id_organisme = $id_organisme;
    }

    public function getIdHotel()
    {
        return $this->id_hotel;
    }

    public function setIdHotel($id_hotel)
    {
        $this->id_hotel = $id_hotel;
    }

    public function getIdSession()
    {
        return $this->id_session;
    }

    public function setIdSession($id_session)
    {
        $this->id_session = $id_session;
    }

    // Connexion à la base de données
    private function connect()
    {
        $database = new Database();
        return $database->connect();
    }

    // Inscrire un congressiste à une session
    public function registerToSession($sessionId)
    {
        $db = $this->connect(); // Se connecter à la base
        $sql = "UPDATE congressiste SET id_session = :id_session WHERE id = :id_congressiste";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id_session', $sessionId, PDO::PARAM_INT);
        $stmt->bindValue(':id_congressiste', $this->id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function GetallCongressiste()
    {
        $db = $this->connect();
        $sql = "SELECT * FROM congressiste";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getAllInscritWithSessions()
    {
        $db = $this->connect(); // Connexion à la base
        $sql = "
        SELECT 
            c.id AS congressiste_id,
            c.nom_congressiste,
            s.id AS session_id,
            s.nomId
        FROM congressiste c
        INNER JOIN session s ON c.id_session = s.id
        WHERE c.id_session IS NOT NULL
    ";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
