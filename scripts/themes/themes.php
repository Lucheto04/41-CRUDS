<?php
namespace App;
class themes extends connect {
    private $guardar = 'INSERT INTO themes(id, id_chapter, name_theme, start_date, end_date, description, duration_days) VALUES (:ID, :ID_1, :nombre_tema, :inicio, :final, :descripcion, :dias)';
    private $solicitar = 'SELECT id AS "ID", id_chapter AS "ID_1", name_theme AS "nombre_tema", start_date AS "inicio", end_date AS "final", description AS "descripcion", duration_days AS "dias" FROM themes';
    private $actualizar = 'UPDATE themes SET id_chapter = :ID_1, name_theme = :nombre_tema,  start_date = :inicio,  end_date = :final, description = :descripcion, duration_days = :dias WHERE id = :ID';
    private $eliminar = 'DELETE FROM themes WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_chapter = 1,public $name_theme = 1,public $start_date = 1,public $end_date = 1, public $description = 1, public $duration_days =1){
        parent::__construct();
    } 
    public function deleteAll_themes() {
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

    public function postAll_themes() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_chapter);
            $res->bindValue("nombre_tema", $this->name_theme);
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

    public function putAll_themes() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_chapter);
            $res->bindValue("nombre_tema", $this->name_theme);
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

    public function getAll_themes(){
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
