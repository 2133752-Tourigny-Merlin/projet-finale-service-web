<?php

namespace App\Action\voiture;

use App\Domain\voiture\Service\VoitureView;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VoitureViewAction
{
    private $voitureView;

    public function __construct(VoitureView $voitureView)
    {
        $this->voitureView = $voitureView;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        $resultat = $this->voitureView->viewAllVoitures();

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
