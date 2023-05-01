<?php

namespace App\Action\voiture;

use App\Domain\voiture\Service\VoiturePost;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class VoiturePostAction
{
    private $movieView;

    public function __construct(VoiturePost $movieView)
    {
        $this->movieView = $movieView;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $marque = $request->getAttribute('marque');
        $modele = $request->getAttribute('model');
        $annee = $request->getAttribute('annee');
        $couleur = $request->getAttribute('couleur');

        $resultat = $this->movieView->AjoutVoiture($marque, $modele, $annee, $couleur);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
