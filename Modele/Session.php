<?php
include_once './Modele/Database.php';

class Session
{

    private $id_session;
    private $nom_id;
    private $date_session;
    private $heure;
    private $prix;

    // Constructeur avec les paramètres
    public function __construct($id_session = null, $nom_id = null, $date_session = null, $heure = null, $prix = null)
    {
        $this->id_session = $id_session;
        $this->nom_id = $nom_id;
        $this->date_session = $date_session;
        $this->heure = $heure;
        $this->prix = $prix;
    }

    // Getters et Setters
    public function getIdSession()
    {
        return $this->id_session;
    }

    public function setIdSession($id_session)
    {
        $this->id_session = $id_session;
    }

    public function getNomId()
    {
        return $this->nom_id;
    }

    public function setNomId($nom_id)
    {
        $this->nom_id = $nom_id;
    }

    public function getDateSession()
    {
        return $this->date_session;
    }

    public function setDateSession($date_session)
    {
        $this->date_session = $date_session;
    }

    public function getHeure()
    {
        return $this->heure;
    }

    public function setHeure($heure)
    {
        $this->heure = $heure;
    }

    public function getPrixSession()
    {
        return $this->prix;
    }

    public function setPrixSession($prix)
    {
        $this->prix = $prix;
    }

    // Méthode pour se connecter à la base de données
    public function connect()
    {
        $database = new Database();
        return $database->connect();
    }

    // Créer une session dans la base de données
    public function createSession($session)
    {
        $db = $this->connect();
        $sql = "INSERT INTO session (nomId, date_session, heure, prix) VALUES (:nomId, :date_session, :heure, :prix_session)";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nomId', $session->getNomId());
        $stmt->bindValue(':date_session', $session->getDateSession());
        $stmt->bindValue(':heure', $session->getHeure());
        $stmt->bindValue(':prix_session', $session->getPrixSession());
        $stmt->execute();
    }

    // Récupérer toutes les sessions
    public function getSessions()
    {
        $db = $this->connect();
        $sql = "SELECT * FROM session";
        $stmt = $db->query($sql);
        $sessions = [];
        while ($row = $stmt->fetch()) {
            $session = new Session(
                $row['id'],
                $row['nomId'],
                $row['date_session'],
                $row['heure'],
                $row['prix']
            );
            $sessions[] = $session;
        }
        return $sessions;
    }
    public function updateSession($session)
    {
        $db = $this->connect();
        $sql = "UPDATE session SET nomId = :nomId, date_session = :date_session, heure = :heure, prix = :prix_session WHERE id = :id_session";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':nomId', $session->getNomId());
        $stmt->bindValue(':date_session', $session->getDateSession());
        $stmt->bindValue(':heure', $session->getHeure());
        $stmt->bindValue(':prix_session', $session->getPrixSession());
        $stmt->bindValue(':id_session', $session->getIdSession());
        $stmt->execute();
    }
    public function deleteSession($id)
    {
        $db = $this->connect();
        $sql = "DELETE FROM session WHERE id = :id_session";
        $stmt = $db->prepare($sql);
        $stmt->bindValue(':id_session', $id);
        $stmt->execute();
    }
}
