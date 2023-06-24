<?php
    require "../vendor/autoload.php";
    $router = new \Bramus\Router\Router();
    // GET
    $router->get("/camper", function(){
        $cox = new \App\connect();
        $res = $cox->con->prepare("SELECT * FROM academic_area");
        $res->execute();    
        $res = $res->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($res);
    });
    $router->run();
?>