<?php

namespace App\Domain\voiture\Service;

use App\Domain\voiture\Repository\VoitureRepository;

/**
 * Service.
 */
final class VoiturePut
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
     * Sélectionne tous les films.
     *
     * @return array La liste des films
     */
    public function updateCouleurVoiture(int $voitureId, string $couleur): array
    {

        $voitures = $this->repository->updateCouleurVoiture($voitureId, $couleur);

        // Tableau qui contient la réponse à retourner à l'usager
        $resultat = [
            "CouleurVoiture" => $voitures
        ];

        return $resultat;
    }


}
