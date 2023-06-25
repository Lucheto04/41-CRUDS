<?php
namespace App;
class personal_ref extends connect {
    private $guardar = 'INSERT INTO personal_ref(id, full_name, cel_number, relationship, occupation) VALUES (:ID, :nombre_completo, :numero, :relacion, :ocupacion)';
    private $solicitar = 'SELECT id AS "ID", full_name AS "nombre_completo", cel_number AS "numero", relationship AS "relacion", occupation AS "ocupacion" FROM personal_ref';
    private $actualizar = 'UPDATE personal_ref SET full_name = :nombre_completo, cel_number = :numero,  relationship = :relacion,  occupation = :ocupacion   WHERE id = :ID';
    private $eliminar = 'DELETE FROM personal_ref WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $full_name = 1,public $cel_number = 1,public $relationship = 1,public $occupation = 1){
        parent::__construct();
    } 

    public function deleteAll_personal_ref() {
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

    public function postAll_personal_ref() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_completo", $this->full_name);
            $res->bindValue("numero", $this->cel_number);
            $res->bindValue("relacion", $this->relationship);
            $res->bindValue("ocupacion", $this->occupation);
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

    public function putAll_personal_ref() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_completo", $this->full_name);
            $res->bindValue("numero", $this->cel_number);
            $res->bindValue("relacion", $this->relationship);
            $res->bindValue("ocupacion", $this->occupation);
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

    public function getAll_personal_ref(){
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
