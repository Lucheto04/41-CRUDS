<?php 
namespace App;
class academic_area extends connect{
    private $guardar = 'INSERT INTO academic_area(id, id_area, id_staff, id_position, id_journey) VALUES (:ID, :ID_1, :ID_2, :ID_3, :ID_4)';
    private $solicitar = 'SELECT id AS "ID", id_area AS "ID_1", id_staff AS "ID_2", id_position AS "ID_3", id_journey AS "ID_4" FROM academic_area';
    private $actualizar = 'UPDATE academic_area SET id_area = :ID_1, id_staff = :ID_2,  id_position = :ID_3,  id_journey = :ID_4   WHERE id = :ID';
    private $eliminar = 'DELETE FROM academic_area WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_area = 1,public $id_staff = 1,public $id_position = 1,public $id_journey = 1){
        parent::__construct();
    }

    public function deleteAll_academic_area() {
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

    public function postAll_academic_area() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_area);
            $res->bindValue("ID_2", $this->id_staff);
            $res->bindValue("ID_3", $this->id_position);
            $res->bindValue("ID_4", $this->id_journey);
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

    public function putAll_academic_area() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_area);
            $res->bindValue("ID_2", $this->id_staff);
            $res->bindValue("ID_3", $this->id_position);
            $res->bindValue("ID_4", $this->id_journey);
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

    public function getAll_academic_area(){
        try{
            $res = $this->conexion->prepare($this->solicitar);
            $res->execute();
            if ($res->rowCount() > 0){
                $this->mensaje = ["Mensaje" => $res->fetchAll(\PDO::FETCH_ASSOC)];
            }
        }   catch (\PDOException $e) {
            $this->mensaje = ["Code" => $e->getCode(), "Mensaje" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->mensaje);
        }
    }
}

?>