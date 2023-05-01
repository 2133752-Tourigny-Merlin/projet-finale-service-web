<?php

namespace App\Action\voiture;

use App\Domain\voiture\Service\VoiturePut;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VoiturePutAction
{
    private $voiturePut;

    public function __construct(VoiturePut $voiturePut)
    {
        $this->voiturePut = $voiturePut;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $voitureId = $request->getAttribute('id');
        $couleur = $request->getAttribute('couleur');

        $resultat = $this->voiturePut->updateCouleurVoiture($voitureId, $couleur);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
