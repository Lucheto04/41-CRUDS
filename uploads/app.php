<?php
    require "../vendor/autoload.php";
    $router = new \Bramus\Router\Router()
;

    $router->mount('/camper', function() use ($router) {
        $router->before('GET|POST', '/', function(){
            // GET
            $cox = new \App\connect();
            $res = $cox->con->prepare("SELECT * FROM academic_area");
            $res->execute();    
            $res = $res->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($res);

            // POST
            $_DATA_POST = json_decode(file_get_contents("php://input"), true);
            $res = $cox->con->prepare("INSERT INTO academic_area (id_area, id_staff, id_position, id_journey) VALUES (:ID_AREA, :ID_STAFF, :ID_POSITION, :ID_JOURNEY)");
            $res->bindValue("ID_AREA", $_DATA_POST["id1"]);  
            $res->bindValue("ID_STAFF", $_DATA_POST["id2"]);  
            $res->bindValue("ID_POSITION", $_DATA_POST["id3"]);  
            $res->bindValue("ID_JOURNEY", $_DATA_POST["id4"]);  
            $res->execute();    
            $res = $res->rowCount();
            echo json_encode($res);
        });

        // DELETE
        $router->delete("/", function(){
            $_DATA = json_decode(file_get_contents("php://input"), true);
            $cox = new \App\connect();
            $res = $cox->con->prepare("DELETE FROM academic_area WHERE id=:ID");
            $res->bindValue("ID", $_DATA["id"]);    
            $res->execute();    
            $res = $res->rowCount();
            echo json_encode($res);
        });
});

    $router->run();
?>