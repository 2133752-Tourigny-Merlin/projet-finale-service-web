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
     */
    public function insertVoiture($marque, $model, $annee, $couleur){
        $sql = "INSERT INTO voitures (marque, model, annee, couleur) VALUES (:marque, :model, :annee, :couleur)";
        $result = false;
        $stmt = $this->connection->prepare($sql);
        if($stmt){
            $stmt->bindParam(':marque', $marque, PDO::PARAM_STR);
            $stmt->bindParam(':model', $model, PDO::PARAM_STR);
            $stmt->bindParam(':annee', $annee, PDO::PARAM_STR);
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
            $stmt->bindParam(':couleur', $couleur, PDO::PARAM_STR);
            $stmt->execute();
            $result = true;
        }
        return $result;
    }

    /**
     * Select toute les voitures
     */
    public function selectAllVoitures(){
        $sql = "SELECT id, marque, model, annee, couleur FROM voitures";
        $result = false;
        $stmt = $this->connection->prepare($sql);
        if($stmt){
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    /**
     * change la clé d'Api du user
     */
    public function modifApi(string $nom, string $code, int $afficher)
    {
        $codeHash = "SELECT code FROM usagers WHERE nom = :nom";
        $stmt = $this->connection->prepare($codeHash);
        if($stmt){
            $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetchColumn();
        }

        if(password_verify($code, $result)) {
            $sql = "UPDATE usagers SET cle = :cle WHERE nom = :nom AND code = :code";
            $api = bin2hex(random_bytes(32));
            $stmt = $this->connection->prepare($sql);
            if ($stmt) {
                $stmt->bindParam(':cle', $api, PDO::PARAM_STR);
                $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
                $stmt->bindParam(':code', $result, PDO::PARAM_STR);
                $stmt->execute();
            }

            if ($afficher == 1) {
                return $api;
            } else {
                return "";
            }
        } else {
            return "information incorect";
        }

    }


    /**
     * Select cle api
     */
    public function selectCleApi(string $api){
        $sql = "SELECT nom FROM usagers where cle = :api";
        $result = true;
        $stmt = $this->connection->prepare($sql);
        if($stmt){
            $stmt->bindParam(':api', $api, PDO::PARAM_STR);
            $stmt->execute();
            $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if(Empty($resultat)){
                $result = false;
            } else {
                $result = true;
            }
        } else {
            $result = false;
        }

        return $result;
    }

}

