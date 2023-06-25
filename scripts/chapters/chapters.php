<?php
namespace App;
class chapters extends connect {
    private $guardar = 'INSERT INTO chapters (id, id_thematic_units, name_chapter, start_date, end_date, description, duration_days) VALUES (:ID, :unidades_tematicas, :nombre_capitulo, :inicio_fecha, :fin_fecha, :descripcion, :diracion_dias)';
    private $solicitar = 'SELECT id AS "ID", id_thematic_units AS "unidades_tematicas", name_chapter AS "nombre_capitulo", start_date AS "inicio_fecha", end_date AS "fin_fecha", description AS "descripcion", duration_days AS "diracion_dias" FROM chapters';
    private $actualizar = 'UPDATE chapters SET id_thematic_units = :unidades_tematicas, name_chapter = :nombre_capitulo, start_date = :inicio_fecha, end_date = :fin_fecha, description = :descripcion, duration_days = :diracion_dias WHERE id = :ID';
    private $eliminar = 'DELETE FROM chapters WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_thematic_units = 1,public $name_chapter = 1,public $start_date = 1,public $end_date = 1, public $description = 1, public $duration_days = 1){
        parent::__construct();
    } 

    public function deleteAll_chapters() {
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

    public function postAll_chapters() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("unidades_tematicas", $this->id_thematic_units);
            $res->bindValue("nombre_capitulo", $this->name_chapter);
            $res->bindValue("inicio_fecha", $this->start_date);
            $res->bindValue("fin_fecha", $this->end_date);
            $res->bindValue("descripcion", $this->description);
            $res->bindValue("diracion_dias", $this->duration_days);
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

    public function putAll_chapters() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("unidades_tematicas", $this->id_thematic_units);
            $res->bindValue("nombre_capitulo", $this->name_chapter);
            $res->bindValue("inicio_fecha", $this->start_date);
            $res->bindValue("fin_fecha", $this->end_date);
            $res->bindValue("descripcion", $this->description);
            $res->bindValue("diracion_dias", $this->duration_days);
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

    public function getAll_chapters() {
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