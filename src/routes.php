<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/api/list', function (Request $request, Response $response, array $args) {

	$res = $this->guzzle->get('characters',  ['query' => array_merge(
        $this->guzzle->getConfig('query'),
        ['limit' => 20, 'offset' => 100]
    )]);

	return $response->withJson(json_decode($res->getBody()->getContents())->data);
});
