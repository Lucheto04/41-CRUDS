<?php
namespace App;
class optional_topics extends connect {
    private $guardar = 'INSERT INTO optional_topics(id, id_topic, id_team, id_subject, id_camper, id_team_educator) VALUES (:ID, :ID_1, :ID_2, :ID_3, :ID_4, :ID_5)';
    private $solicitar = 'SELECT id AS "ID", id_topic AS "ID_1", id_team AS "ID_2", id_subject AS "ID_3", id_camper AS "ID_4", id_team_educator AS "ID_5" FROM optional_topics';
    private $actualizar = 'UPDATE optional_topics SET id_topic = :ID_1, id_team = :ID_2,  id_subject = :ID_3,  id_camper = :ID_4, id_team_educator = :ID_5 WHERE id = :ID';
    private $eliminar = 'DELETE FROM optional_topics WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_topic = 1,public $id_team = 1,public $id_subject = 1,public $id_camper = 1, public $id_team_educator = 1){
        parent::__construct();
    } 

    public function deleteAll_optional_topics() {
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

    public function postAll_optional_topics() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_topic);
            $res->bindValue("ID_2", $this->id_team);
            $res->bindValue("ID_3", $this->id_subject);
            $res->bindValue("ID_4", $this->id_camper);
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

    public function putAll_optional_topics() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_topic);
            $res->bindValue("ID_2", $this->id_team);
            $res->bindValue("ID_3", $this->id_subject);
            $res->bindValue("ID_4", $this->id_camper);
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

    public function getAll_optional_topics(){
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
