<?php
namespace App;
class review_skills extends connect {
    private $guardar = 'INSERT INTO review_skills(id, id_team_schedule,  id_journey, id_tutor, id_location) VALUES (:ID, :ID_1, :ID_2, :ID_3, :ID_4)';
    private $solicitar = 'SELECT id AS "ID", id_team_schedule AS "ID_1", id_journey AS "ID_2", id_tutor AS "ID_3", id_location AS "ID_4" FROM review_skills';
    private $actualizar = 'UPDATE review_skills SET id_team_schedule = :ID_1, id_journey = :ID_2,  id_tutor = :ID_3,  id_location = :ID_4   WHERE id = :ID';
    private $eliminar = 'DELETE FROM review_skills WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_team_schedule = 1,public $id_journey = 1,public $id_tutor = 1,public $id_location = 1){
        parent::__construct();
    } 

    public function deleteAll_review_skills() {
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

    public function postAll_review_skills() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_team_schedule);
            $res->bindValue("ID_2", $this->id_journey);
            $res->bindValue("ID_3", $this->id_tutor);
            $res->bindValue("ID_4", $this->id_location);
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

    public function putAll_review_skills() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_team_schedule);
            $res->bindValue("ID_2", $this->id_journey);
            $res->bindValue("ID_3", $this->id_tutor);
            $res->bindValue("ID_4", $this->id_location);
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

    public function getAll_review_skills(){
        try{
            $res = $this->conexion->prepare($this->solicitar);
            $res->execute();
            if ($res->rowCount() > 0){
                $this->mensaje = ["Mensaje" => $res->fetchAll(\PDO::FETCH_ASSOC)];
            }  else {
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
