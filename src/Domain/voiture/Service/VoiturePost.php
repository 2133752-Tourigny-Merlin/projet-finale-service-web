<?php

namespace App\Domain\voiture\Service;

use App\Domain\voiture\Repository\VoitureRepository;

/**
 * Service.
 */
final class VoiturePost
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
     * Ajoute une voiture.
     *
     * @return array true ou false si l'insert a fonctionné
     */
    public function AjoutVoiture(string $marque, string $model, string $annee, string $couleur): array
    {

        $voitures = $this->repository->insertVoiture($marque, $model, $annee, $couleur);

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = [
            "VoituresAjouter" => $voitures
        ];

        return $resultat;
    }


}
