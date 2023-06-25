<?php
namespace App;
class emergency_contact extends connect {
    private $guardar = 'INSERT INTO emergency_contact(id, id_staff, cel_number, relationship, full_name, email) VALUES (:ID, :ID_1, :numero, :relacion, :nombre, :correo)';
    private $solicitar = 'SELECT id AS "ID", id_staff AS "ID_1", cel_number AS "numero", relationship AS "relacion", full_name AS "nombre", email AS "correo" FROM emergency_contact';
    private $actualizar = 'UPDATE emergency_contact SET id_staff = :ID_1, cel_number = :numero,  relationship = :relacion,  full_name = :nombre, email = :correo WHERE id = :ID';
    private $eliminar = 'DELETE FROM emergency_contact WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_staff = 1,public $cel_number = 1,public $relationship = 1,public $full_name = 1, public $email = 1){
        parent::__construct();
    } 

    public function deleteAll_emergency_contact() {
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

    public function postAll_emergency_contact() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_staff);
            $res->bindValue("numero", $this->cel_number);
            $res->bindValue("relacion", $this->relationship);
            $res->bindValue("nombre", $this->full_name);
            $res->bindValue("correo", $this->email);
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

    public function putAll_emergency_contact() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_staff);
            $res->bindValue("numero", $this->cel_number);
            $res->bindValue("relacion", $this->relationship);
            $res->bindValue("nombre", $this->full_name);
            $res->bindValue("correo", $this->email);
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

    public function getAll_emergency_contact(){
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
