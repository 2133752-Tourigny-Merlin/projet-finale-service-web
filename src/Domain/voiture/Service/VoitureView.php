<?php

namespace App\Domain\voiture\Service;

use App\Domain\voiture\Repository\VoitureRepository;

/**
 * Service.
 */
final class VoitureView
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
     * Sélectionne tous les voitures.
     *
     * @return array La liste des voitures
     */
    public function viewAllVoitures(): array
    {

        $voitures = $this->repository->selectAllVoitures();

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = [
            "Voiture" => $voitures
        ];

        return $resultat;
    }


}
