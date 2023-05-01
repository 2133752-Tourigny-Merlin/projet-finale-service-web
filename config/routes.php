<?php

use Slim\App;

return function (App $app) {

    $app->get('/', \App\Action\HomeAction::class)->setName('home');

    // Documentation de l'api
    $app->get('/docs', \App\Action\Docs\SwaggerUiAction::class);

    //User
    $app->put('/user/{id}/{code}', \App\Action\voiture\userApiPut::class);
    $app->post('/user/{nom}/{prnom}/{code}', \App\Action\voiture\userPostAction::class);

    //Voiture
    $app->get('/voiture', \App\Action\voiture\VoitureViewAction::class);
    $app->post('/voiture/{marque}/{model}/{annee}/{couleur}', \App\Action\voiture\VoiturePostAction::class);
    $app->put('/voiture/{id}/{couleur}', \App\Action\voiture\VoiturePutAction::class);
    $app->delete('/voiture/{id}', \App\Action\voiture\VoitureDeleteAction::class);


};

