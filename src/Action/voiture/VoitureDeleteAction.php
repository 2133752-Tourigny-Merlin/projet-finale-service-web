<?php

namespace App\Action\voiture;

use App\Domain\voiture\Service\VoitureDelete;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VoitureDeleteAction
{
    private $voitureDelete;

    public function __construct(VoitureDelete $voitureDelete)
    {
        $this->voitureDelete = $voitureDelete;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $voitureId = $request->getAttribute('id');

        $resultat = $this->voitureDelete->DeleteVoiture($voitureId);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
