<?php

namespace App\Action\voiture;

use App\Domain\voiture\Service\ApiPut;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

final class userApiPut
{
    private $apiPut;

    public function __construct(ApiPut $apiPut)
    {
        $this->apiPut = $apiPut;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {

        // Récupération des parametres
        $userId = $request->getAttribute('id');
        $code = $request->getAttribute('code');

        $resultat = $this->apiPut->ApiPut($userId, $code);

        // Construit la réponse HTTP
        $response->getBody()->write((string)json_encode($resultat));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(200);
    }
}
