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
    public function ajouterUser(string $nom, string $prenom, string $code): array
    {

        $user = $this->repository->AjoutUser($nom, $prenom, $code);

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = [
            "User" => $user
        ];

        return $resultat;
    }


}
