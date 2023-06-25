<?php
namespace App;
class thematic_units extends connect {
    private $guardar = 'INSERT INTO thematic_units(id, id_route, name_thematics_units, start_date, end_date, description, duration_days) VALUES (:ID, :ID_1, :nombre_unidad, :inicio, :final, :descripcion, :dias)';
    private $solicitar = 'SELECT id AS "ID", id_route AS "ID_1", name_thematics_units AS "nombre_unidad", start_date AS "inicio", end_date AS "final", description AS "descripcion", duration_days AS "dias" FROM thematic_units';
    private $actualizar = 'UPDATE thematic_units SET id_route = :ID_1, name_thematics_units = :nombre_unidad,  start_date = :inicio,  end_date = :final, description = :descripcion, duration_days = :dias WHERE id = :ID';
    private $eliminar = 'DELETE FROM thematic_units WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_route = 1,public $name_thematics_units = 1,public $start_date = 1,public $end_date = 1, public $description = 1, public $duration_days =1){
        parent::__construct();
    } 
    public function deleteAll_thematic_units() {
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

    public function postAll_thematic_units() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_route);
            $res->bindValue("nombre_unidad", $this->name_thematics_units);
            $res->bindValue("inicio", $this->start_date);
            $res->bindValue("final", $this->end_date);
            $res->bindValue("descripcion", $this->description);
            $res->bindValue("dias", $this->duration_days);
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

    public function putAll_thematic_units() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_route);
            $res->bindValue("nombre_unidad", $this->name_thematics_units);
            $res->bindValue("inicio", $this->start_date);
            $res->bindValue("final", $this->end_date);
            $res->bindValue("descripcion", $this->description);
            $res->bindValue("dias", $this->duration_days);
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

    public function getAll_thematic_units(){
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
