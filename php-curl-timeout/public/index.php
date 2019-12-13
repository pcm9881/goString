<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Instantiate App
$app = AppFactory::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write('Example API Server');
    return $response;
});

/**
 * 정상 데이터
 */
$app->get('/api/data', function (Request $request, Response $response, $args) {
  $data['id'] = 1;
  $data['text'] = 'hello, data';
  $json_str = json_encode($data, true);

  $response->getBody()->write($json_str);
  return $response;
});

/**
 * 타임아웃을 위한 sleep
 */
$app->get('/api/sleep/{second}', function (Request $request, Response $response, $args) {
  $second = $args['second'];
  
  $data['id'] = 2;
  $data['second'] = $second;
  $json_str = json_encode($data, true);
  
  sleep($second);
  
  $response->getBody()->write($json_str);
  return $response;
});

$app->run();
