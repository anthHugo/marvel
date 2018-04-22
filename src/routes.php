<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/api/list', function (Request $request, Response $response, array $args) {

	$offset = 99;
	$limit = 20;

	if($request->getParam('page') != null){
		if($request->getParam('page') > 1){
			$offset = ($request->getParam('page') * $limit) - 1;
		} else {
			$offset = 0;
		}
	}

	$query = array_merge($this->marvel->getConfig('query'), ['limit' => $limit, 'offset' =>  $offset]);

	$res = $this->marvel->get('characters', ['query' => $query]);
	
	return $response->withJson(json_decode($res->getBody()->getContents())->data);
});
