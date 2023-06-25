<?php
namespace App;
class team_schedules_review extends connect {
    private $guardar = 'INSERT INTO team_schedules_review(id, team_name, check_in_review, check_out_review, id_journey) VALUES (:ID, :nombre_equipo, :dentro_repaso, :fuera_repaso, :ID_1)';
    private $solicitar = 'SELECT id AS "ID", team_name AS "nombre_equipo", check_in_review AS "dentro_repaso", check_out_review AS "fuera_repaso", id_journey AS "ID_1" FROM team_schedules_review';
    private $actualizar = 'UPDATE team_schedules_review SET team_name = :nombre_equipo, check_in_review = :dentro_repaso,  check_out_review = :fuera_repaso,  id_journey = :ID_1   WHERE id = :ID';
    private $eliminar = 'DELETE FROM team_schedules_review WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $team_name = 1,public $check_in_review = 1,public $check_out_review = 1,public $id_journey = 1){
        parent::__construct();
    } 

    public function deleteAll_team_schedules_review() {
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

    public function postAll_team_schedules_review() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_equipo", $this->team_name);
            $res->bindValue("dentro_repaso", $this->check_in_review);
            $res->bindValue("fuera_repaso", $this->check_out_review);
            $res->bindValue("ID_1", $this->id_journey);
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

    public function putAll_team_schedules_review() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_equipo", $this->team_name);
            $res->bindValue("dentro_repaso", $this->check_in_review);
            $res->bindValue("fuera_repaso", $this->check_out_review);
            $res->bindValue("ID_1", $this->id_journey);
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

    public function getAll_team_schedules_review(){
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
