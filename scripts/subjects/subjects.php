<?php
namespace App;
class subjects extends connect {
    private $guardar = 'INSERT INTO subjects (id, name_subject) VALUES (:ID, :nombre_sujeto)';
    private $solicitar = 'SELECT id AS "ID", name_subject AS "nombre_sujeto" FROM subjects';
    private $actualizar = 'UPDATE subjects SET name_subject = :nombre_sujeto WHERE id = :ID';
    private $eliminar = 'DELETE FROM subjects WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $name_subject = 1) {
        parent::__construct();
    }

    public function deleteAll_subjects() {
        try {
            $res = $this->conexion->prepare($this->eliminar);
            $res->bindValue("ID", $this->id);
            $res->execute();
            $this->mensaje = ["Mensaje" => "Se elimino correctamente"];
        } catch (\PDOException $e) {
            $this->mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        } finally {
            print_r($this->mensaje);
        }
    }
    
    public function postAll_subjects() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_sujeto", $this->name_subject);
            $res->execute();
            $this->mensaje = ["Mensaje" => "Se añadio correctamente"];
        } catch (\PDOException $e) {
            $this->mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        } finally {
            print_r($this->mensaje);
        }
    }

    public function putAll_subjects() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_sujeto", $this->name_subject);
            $res->execute();
            if ($res->rowCount() > 0) {
                $this->mensaje = ["Mensaje" => "Se actualizo correctamente"];
            }
        } catch (\PDOException $e) {
            $this->mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        } finally {
            print_r($this->mensaje);
        }
    }

    public function getALL_subjects() {
        try {
            $res = $this->conexion->prepare($this->solicitar);
            $res->execute();
            $this->mensaje = $res->fetchALL(\PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            $this->mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        } finally {
            print_r($this->mensaje);
        }
    }

}




?>