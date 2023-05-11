<?php

namespace App\Domain\voiture\Service;

use App\Domain\voiture\Repository\VoitureRepository;

/**
 * Service.
 */
final class ApiPut
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
     * @return string
     */
    public function ApiPut(String $nom, string $code, int $afficher): array
    {

        $Api = $this->repository->modifApi($nom, $code, $afficher);

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = [
            "modifApi" => $Api
        ];

        return $resultat;
    }


}
