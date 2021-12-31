<?php
namespace App;

require '/composer/vendor/autoload.php';

use Slim\Factory\AppFactory;

// BEGIN (write your solution here)
$app = AppFactory::create();
// $app->addErrorMiddleware(true, true, true);

$app->get('/', function ($request, $response) {
    $response->write('Welcome to Hexlet!');
    return $response;
    // Благодаря пакету slim/http этот же код можно записать короче
    // return $response->write('Welcome to Slim!');
});
$app->run();
// END