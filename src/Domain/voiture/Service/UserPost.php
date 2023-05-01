<?php

namespace App\Domain\voiture\Service;

use App\Domain\voiture\Repository\VoitureRepository;

/**
 * Service.
 */
final class UserPost
{
    /**
     * @var VoitureRepository
     */
    private $repository;

    /**
     * The constructor.
     *
     * @param VoitureRepository $repository
     */
    public function __construct(VoitureRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Supprime une voiture selon son Id
     *
     * @return array true ou false si la voiture a été supprimer
     */
    public function DeleteVoiture(Int $voitureId): array
    {

        $voitures = $this->repository->DeleteVoiture($voitureId);

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = [
            "voitureSupprimer" => $voitures
        ];

        return $resultat;
    }


}
