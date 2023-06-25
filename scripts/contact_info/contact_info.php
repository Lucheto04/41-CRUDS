<?php
namespace App;
class contact_info extends connect {
    private $guardar = 'INSERT INTO contact_info (id, id_staff, whatsapp, instagram, linkedin, email, address, cel_number) VALUES (:ID, :ID_1, :que_pasa, :insta, :link, :correo, :direccion, :numero)';
    private $solicitar = 'SELECT id AS "ID", id_staff AS "ID_1", whatsapp AS "que_pasa", instagram AS "insta", linkedin AS "link", email AS "correo", address AS "direccion", cel_number AS  "numero" FROM contact_info';
    private $actualizar = 'UPDATE contact_info SET id_staff = :ID_1, whatsapp = :que_pasa, instagram = :insta, linkedin = :link, email = :correo, address = :direccion, cel_number = :numero WHERE id = :ID';
    private $eliminar = 'DELETE FROM contact_info WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_staff = 1,public $whatsapp = 1,public $instagram = 1,public $linkedin = 1, public $email = 1, public $address = 1, public $cel_number = 1){
        parent::__construct();
    } 

    public function deleteAll_contact_info() {
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

    public function postAll_contact_info() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_staff);
            $res->bindValue("que_pasa", $this->whatsapp);
            $res->bindValue("insta", $this->instagram);
            $res->bindValue("link", $this->linkedin);
            $res->bindValue("correo", $this->email);
            $res->bindValue("direccion", $this->address);
            $res->bindValue("numero", $this->cel_number);
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

    public function putAll_contact_info() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_staff);
            $res->bindValue("que_pasa", $this->whatsapp);
            $res->bindValue("insta", $this->instagram);
            $res->bindValue("link", $this->linkedin);
            $res->bindValue("correo", $this->email);
            $res->bindValue("direccion", $this->address);
            $res->bindValue("numero", $this->cel_number);
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

    public function getAll_contact_info() {
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