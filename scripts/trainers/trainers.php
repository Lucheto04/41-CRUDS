<?php
namespace App;
class trainers extends connect {
    private $guardar = 'INSERT INTO trainers(id, id_staff, id_level, id_route, id_academic_area, id_position, id_team_educator) VALUES (:ID, :ID_1, :ID_2, :ID_3, :ID_4, :ID_5, :ID_6)';
    private $solicitar = 'SELECT id AS "ID", id_staff AS "ID_1", id_level AS "ID_2", id_route AS "ID_3", id_academic_area AS "ID_4", id_position AS "ID_5", id_team_educator AS "ID_6" FROM trainers';
    private $actualizar = 'UPDATE trainers SET id_staff = :ID_1, id_level = :ID_2,  id_route = :ID_3,  id_academic_area = :ID_4, id_position = :ID_5, id_team_educator = :ID_6 WHERE id = :ID';
    private $eliminar = 'DELETE FROM trainers WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_staff = 1,public $id_level = 1,public $id_route = 1,public $id_academic_area = 1, public $id_position = 1,public $id_team_educator = 1){
        parent::__construct();
    } 

    public function deleteAll_trainers() {
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

    public function postAll_trainers() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_staff);
            $res->bindValue("ID_2", $this->id_level);
            $res->bindValue("ID_3", $this->id_route);
            $res->bindValue("ID_4", $this->id_academic_area);
            $res->bindValue("ID_5", $this->id_position);
            $res->bindValue("ID_6", $this->id_team_educator);
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

    public function putAll_trainers() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_staff);
            $res->bindValue("ID_2", $this->id_level);
            $res->bindValue("ID_3", $this->id_route);
            $res->bindValue("ID_4", $this->id_academic_area);
            $res->bindValue("ID_5", $this->id_position);
            $res->bindValue("ID_6", $this->id_team_educator);
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

    public function getAll_trainers(){
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
