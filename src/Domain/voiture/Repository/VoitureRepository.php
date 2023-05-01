<?php

namespace App\Domain\voiture\Repository;

use PDO;

/**
 * Repository.
 */
class VoitureRepository
{
    /**
     * @var PDO The database connection
     */
    private $connection;

    /**
     * Constructor.
     *
     * @param PDO $connection The database connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Sélectionne la liste de tous les films
     *
     * @return Bool
     */
    public function DeleteVoiture($voitureId){
        $sql = "DELETE FROM voitures where id = :id";
        $result = false;
        $stmt = $this->connection->prepare($sql);
        if($stmt){
            $stmt->bindParam(':id', $voitureId, PDO::PARAM_INT);
            $stmt->execute();
            $result = true;
        }
        return $result;
    }

    /**
     * Insere une nouvelle voiture
     *
     * @return Bool
     */
    public function insertVoiture($marque, $model, $annee, $couleur){
        $sql = "INSERT INTO voitures (marque, model, anne, couleur) VALUES (:marque, :model, :anne, :couleur)";
        $result = false;
        $stmt = $this->connection->prepare($sql);
        if($stmt){
            $stmt->bindParam(':marque', $marque, PDO::PARAM_STR);
            $stmt->bindParam(':model', $model, PDO::PARAM_STR);
            $stmt->bindParam(':annee', $annee, PDO::PARAM_INT);
            $stmt->bindParam(':couleur', $couleur, PDO::PARAM_STR);
            $stmt->execute();
            $result = true;
        }
        return $result;
    }

    /**
     * change la couleur d'une voiture
     *
     * @return Bool
     */
    public function updateCouleurVoiture(int $voitureId, string $couleur){
        $sql = "UPDATE voitures SET couleur = :couleur WHERE id = :id";
        $result = false;
        $stmt = $this->connection->prepare($sql);
        if($stmt){
            $stmt->bindParam(':id', $voitureId, PDO::PARAM_INT);
            $stmt->bindParam(':couleur', $couelur, PDO::PARAM_STR);
            $stmt->execute();
            $result = true;
        }
        return $result;
    }

    /**
     * Select toute les voitures
     */
    public function selectAllVoitures(){
        $sql = "SELECT marque, model, annee, couleur FROM voitures";
        $result = false;
        $stmt = $this->connection->prepare($sql);
        if($stmt){
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    /**
     * Insert nouveau user
     */
    public function AjoutUser(string $nom,string $prenom,string $code){
        $sql = "INSERT INTO user (nom, prenom, code) VALUES (:nom, :prenom, :code)";

        $result = false;
        $stmt = $this->connection->prepare($sql);
        if($stmt){
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $stmt->bindParam(':code', $code, PDO::PARAM_STR);
            $stmt->execute();
            $result = true;
        }
        return $result;
    }

    /**
     * change la clé d'Api du user
     *
     * @return Bool
     */
    public function modifApi(int $userId, string $code){
        $sql = "UPDATE user SET api = :api WHERE id = :id AND code = :code";
        $result = false;
        $api = bin2hex(random_bytes(32));
        $stmt = $this->connection->prepare($sql);
        if($stmt){
            $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
            $stmt->bindParam(':code', $code, PDO::PARAM_STR);
            $stmt->bindParam(':api', $api, PDO::PARAM_STR);
            $stmt->execute();
            $result = true;
        }
        return $result;
    }
}

