<?php

require_once "../vendor/autoload.php";
$router = new \Bramus\Router\Router();


$router->get("/{tabla}", function($tabla) {
    $class = "App\\" .$tabla;
    $method = "getAll_" . $tabla;
    $instance = $class::getInstance(json_decode(file_get_contents("php://input"), true))->$method();
});
$router->put("/{tabla}", function($tabla) {
    $class = "App\\" .$tabla;
    $method = "putAll_" . $tabla;
    $instance = $class::getInstance(json_decode(file_get_contents("php://input"), true))->$method();
})
;$router->post("/{tabla}", function($tabla) {
    $class = "App\\" .$tabla;
    $method = "postAll_" . $tabla;
    $instance = $class::getInstance(json_decode(file_get_contents("php://input"), true))->$method();
});
;$router->delete("/{tabla}", function($tabla) {
    $class = "App\\" .$tabla;
    $method = "deleteAll_" . $tabla;
    $instance = $class::getInstance(json_decode(file_get_contents("php://input"), true))->$method();
});

$router->run();
?>
