<?php
namespace App;
class campers extends connect {
    private $guardar = 'INSERT INTO campers (id, id_team_schedule, id_route, id_trainer, id_psycologist, id_teacher, id_level, id_journey, id_staff) VALUES (:ID, :ID_1, :ID_2, :ID_3, :ID_4, :ID_5, :ID_6, :ID_7, :ID_8)';
    private $solicitar = 'SELECT id AS "ID", id_team_schedule AS "ID_1", id_route AS "ID_2", id_trainer AS "ID_3", id_psycologist AS "ID_4", id_teacher AS "ID_5", id_level AS "ID_6", id_journey AS  "ID_7", id_staff AS "ID_8" FROM campers';
    private $actualizar = 'UPDATE campers SET id_team_schedule = :ID_1, id_route = :ID_2, id_trainer = :ID_3, id_psycologist = :ID_4, id_teacher = :ID_5, id_level = :ID_6, id_journey = :ID_7, id_staff = :ID_8 WHERE id = :ID';
    private $eliminar = 'DELETE FROM campers WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_team_schedule = 1,public $id_route = 1,public $id_trainer = 1,public $id_psycologist = 1, public $id_teacher = 1, public $id_level = 1, public $id_journey = 1, public $id_staff = 1){
        parent::__construct();
    } 

    public function deleteAll_campers() {
        try {
            $res = $this->conexion->prepare($this->eliminar);
            $res->bindValue("ID", $this->id);
            $res->execute();
            if ($res->rowCount() > 0){
                $this->mensaje = ["Mensaje" => "Se elimino correctamente"];
            } else {
                $this->mensaje = ["Mensaje" => "No se realizo ningun cambio"];
            }
        }   catch (\PDOException $e) {
            $this->mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->mensaje);
        }
    }

    public function postAll_campers() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_team_schedule);
            $res->bindValue("ID_2", $this->id_route);
            $res->bindValue("ID_3", $this->id_trainer);
            $res->bindValue("ID_4", $this->id_psycologist);
            $res->bindValue("ID_5", $this->id_teacher);
            $res->bindValue("ID_6", $this->id_level);
            $res->bindValue("ID_7", $this->id_journey);
            $res->bindValue("ID_8", $this->id_staff);
            $res->execute();
            if ($res->rowCount() > 0){
                $this->mensaje = ["Mensaje" => "Se añadio correctamente"];
            } else {
                $this->mensaje = ["Mensaje" => "No se realizo ningun cambio"];
            }
        }   catch (\PDOException $e) {
            $this->mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->mensaje);
        }
    }

    public function putAll_campers() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_team_schedule);
            $res->bindValue("ID_2", $this->id_route);
            $res->bindValue("ID_3", $this->id_trainer);
            $res->bindValue("ID_4", $this->id_psycologist);
            $res->bindValue("ID_5", $this->id_teacher);
            $res->bindValue("ID_6", $this->id_level);
            $res->bindValue("ID_7", $this->id_journey);
            $res->bindValue("ID_8", $this->id_staff);
            $res->execute();
            if ($res->rowCount() > 0){
                $this->mensaje = ["Mensaje" => "Se actualizo correctamente"];
            } else {
                $this->mensaje = ["Mensaje" => "No se realizo ningun cambio"];
            }
        }   catch (\PDOException $e) {
            $this->mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->mensaje);
        }
    }

    public function getAll_campers() {
        try{
            $res = $this->conexion->prepare($this->solicitar);
            $res->execute();
            if ($res->rowCount() > 0){
                $this->mensaje = ["Mensaje" => $res->fetchAll(\PDO::FETCH_ASSOC)];
            } else {
                $this->mensaje = ["Mensaje" => "No hay datos en esta tabla"];
            }
        }   catch (\PDOException $e) {
            $this->mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->mensaje);
        }
    }  
}


?>