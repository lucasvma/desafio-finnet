<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Incluindo o arquivo de configuração de dependências e autoload
require "bootstrap.php";

/**
 * Instalação do Slim
 * @var string
 */
$app->get('/', function (Request $request, Response $response) use ($app) {
    $response->getBody()->write("Desafio Finnet!");
    return $response;
});


$app->run();