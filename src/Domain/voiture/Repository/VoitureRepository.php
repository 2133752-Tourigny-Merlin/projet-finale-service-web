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

        $stmt = $this->connection->prepare($sql);
        if($stmt){
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
}

