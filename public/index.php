<?php
ini_set("display_errors", 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$products = [
    ["id" => 1, "name" => "Samsung Galaxy S7", "price" => 1000],
    ["id" => 2, "name" => "Apple IPhone 6", "price" => 2000],
    ["id" => 3, "name" => "Lenovo Tab 4", "price" => 3000],
    ["id" => 4, "name" => "Apple IPad 2", "price" => 4000],
    ["id" => 5, "name" => "Asus ROG GZ700", "price" => 5000],
];

$app->get('/', function (Request $request, Response $response, $args) use ($products) {

    $data["products"] = $products;

    $renderer = new PhpRenderer('../templates');
    return $renderer->render($response, "index.php", $data);

});

$app->get('/buy/{id}', function (Request $request, Response $response, $args) use ($products) {

    foreach($products as $product) {
        if($args["id"] == $product["id"]) {
            $data["selected_product"] = $product;
        }
    }

    if(!empty($data["selected_product"])) {

    } else {
        $renderer = new PhpRenderer('../templates');
        return $renderer->render($response, "error.php");
    }

    $renderer = new PhpRenderer('../templates');
    return $renderer->render($response, "done.php", $data);

});


$app->post('/filter', function (Request $request, Response $response, $args) use ($products) {

    $params = json_decode(file_get_contents("php://input"), true);

    $filtered = [];
    $keyword = trim($params["keyword"]);

    if(strlen($keyword) > 0) {
        foreach ($products as $product) {
            if (stripos($product["name"], $params["keyword"]) !== false) {
                $filtered[] = $product;
            }
        }
    } else {
        $filtered = $products;
    }

    $data["filtered"] = $filtered;

    $payload = json_encode($data);

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json');



});

$app->run();
