<?php 
namespace App;
class work_reference extends connect{
    private $guardar = 'INSERT INTO work_reference(id, full_name, cel_number, `position`, company) VALUES (:ID, :nombre, :numero, :posicion, :compañia)';
    private $solicitar = 'SELECT id AS "ID",  full_name AS "nombre",  cel_number AS "numero",  position AS "posicion",  company AS "compañia" FROM work_reference';
    private $actualizar = 'UPDATE work_reference SET full_name = :nombre, cel_number = :numero,  `position` = :posicion,  company = :compañia   WHERE id = :ID';
    private $eliminar = 'DELETE FROM work_reference WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $full_name = 1,public $cel_number = 1,public $position = 1,public $company = 1){
        parent::__construct();
    }

    public function deleteAll_work_reference() {
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
    //! NO FUNCIONA, TIRA ERROR HY093
    public function postAll_work_reference() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre", $this->full_name);
            $res->bindValue("numero", $this->cel_number);
            $res->bindValue("posicion", $this->position);
            $res->bindValue("compañia", $this->company);
            $res->execute();
            if ($res->rowCount() > 0){
                $this->mensaje = ["Mensaje" => "Se añadió correctamente"];
            } else {
                $this->mensaje = ["Mensaje" => "No se realizó ningún cambio"];
            }
        } catch (\PDOException $e) {
            $this->mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        } finally {
            print_r($this->mensaje);
        }
    }
    //! NO FUNCIONA, TIRA ERROR HY093
    public function putAll_work_reference() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre", $this->full_name);
            $res->bindValue("numero", $this->cel_number);
            $res->bindValue("posicion", $this->position);
            $res->bindValue("compañia", $this->company);
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

    public function getAll_work_reference(){
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