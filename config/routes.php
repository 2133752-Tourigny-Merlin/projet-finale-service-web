<?php

use Slim\App;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
use App\Middleware\ExampleBeforeMiddleware;
return function (App $app) {


    $app->get('/', \App\Action\HomeAction::class)->setName('home')
        ->add(ExampleBeforeMiddleware::class);

    // Documentation de l'api
    $app->get('/docs', \App\Action\Docs\SwaggerUiAction::class)
        ->add(ExampleBeforeMiddleware::class);

    //User
    $app->put('/user/{nom}/{code}/{afficher}', \App\Action\voiture\userApiPut::class);

    //Voiture
    $app->get('/voiture', \App\Action\voiture\VoitureViewAction::class)
        ->add(ExampleBeforeMiddleware::class);
    $app->post('/voiture/{marque}/{model}/{annee}/{couleur}', \App\Action\voiture\VoiturePostAction::class)
        ->add(ExampleBeforeMiddleware::class);
    $app->put('/voiture/{id}/{couleur}', \App\Action\voiture\VoiturePutAction::class)
        ->add(ExampleBeforeMiddleware::class);
    $app->delete('/voiture/{id}', \App\Action\voiture\VoitureDeleteAction::class)
        ->add(ExampleBeforeMiddleware::class);
};

