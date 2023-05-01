<?php

namespace App\Action\voiture;

use App\Domain\voiture\Service\UserPost;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class userPostAction
{
    private $ajoutUser;

    public function __construct(UserPost $ajoutUser)
    {
        $this->ajoutUser = $ajoutUser;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $nom = $request->getAttribute('nom');
        $prenom = $request->getAttribute('prenom');
        $code = $request->getAttribute('code');

        $resultat = $this->ajoutUser->ajouterUser($nom, $prenom, $code);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
