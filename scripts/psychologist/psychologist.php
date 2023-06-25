<?php
namespace App;
class psychologist extends connect {
    private $guardar = 'INSERT INTO psychologist(id, id_staff, id_route, id_academic_area_psycologist, id_position, id_team_educator) VALUES (:ID, :ID_1, :ID_2, :ID_3, :ID_4, :ID_5)';
    private $solicitar = 'SELECT id AS "ID", id_staff AS "ID_1", id_route AS "ID_2", id_academic_area_psycologist AS "ID_3", id_position AS "ID_4", id_team_educator AS "ID_5" FROM psychologist';
    private $actualizar = 'UPDATE psychologist SET id_staff = :ID_1, id_route = :ID_2,  id_academic_area_psycologist = :ID_3,  id_position = :ID_4, id_team_educator = :ID_5 WHERE id = :ID';
    private $eliminar = 'DELETE FROM psychologist WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_staff = 1,public $id_route = 1,public $id_academic_area_psycologist = 1,public $id_position = 1, public $id_team_educator = 1){
        parent::__construct();
    } 

    public function deleteAll_psychologist() {
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

    public function postAll_psychologist() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_staff);
            $res->bindValue("ID_2", $this->id_route);
            $res->bindValue("ID_3", $this->id_academic_area_psycologist);
            $res->bindValue("ID_4", $this->id_position);
            $res->bindValue("ID_5", $this->id_team_educator);
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

    public function putAll_psychologist() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_staff);
            $res->bindValue("ID_2", $this->id_route);
            $res->bindValue("ID_3", $this->id_academic_area_psycologist);
            $res->bindValue("ID_4", $this->id_position);
            $res->bindValue("ID_5", $this->id_team_educator);
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

    public function getAll_psychologist(){
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
