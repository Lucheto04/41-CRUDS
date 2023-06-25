<?php
namespace App;
class staff extends connect {
    private $guardar = 'INSERT INTO staff(id, doc, first_name, second_name, first_surname, second_surname, eps, id_area, id_city) VALUES (:ID, :documentacion, :primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :EPS, :ID_1, :ID_2)';
    private $solicitar = 'SELECT id AS "ID", doc AS "documentacion", first_name AS "primer_nombre", second_name AS "segundo_nombre", first_surname AS "primer_apellido", second_surname AS "segundo_apellido", eps AS "EPS", id_area AS "ID_1", id_city AS "ID_2" FROM staff';
    private $actualizar = 'UPDATE staff SET doc = :documentacion, first_name = :primer_nombre,  second_name = :segundo_nombre,  first_surname = :primer_apellido, second_surname = :segundo_apellido, eps = :EPS, id_area = :ID_1, id_city = :ID_2 WHERE id = :ID';
    private $eliminar = 'DELETE FROM staff WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $doc = 1,public $first_name = 1,public $second_name = 1,public $first_surname = 1, public $second_surname = 1, public $eps =1, public $id_area = 1, public $id_city = 1){
        parent::__construct();
    } 

    public function deleteAll_staff() {
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

    public function postAll_staff() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("documentacion", $this->doc);
            $res->bindValue("primer_nombre", $this->first_name);
            $res->bindValue("segundo_nombre", $this->second_name);
            $res->bindValue("primer_apellido", $this->first_surname);
            $res->bindValue("segundo_apellido", $this->second_surname);
            $res->bindValue("EPS", $this->eps);
            $res->bindValue("ID_1", $this->id_area);
            $res->bindValue("ID_2", $this->id_city);
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

    public function putAll_staff() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("documentacion", $this->doc);
            $res->bindValue("primer_nombre", $this->first_name);
            $res->bindValue("segundo_nombre", $this->second_name);
            $res->bindValue("primer_apellido", $this->first_surname);
            $res->bindValue("segundo_apellido", $this->second_surname);
            $res->bindValue("EPS", $this->eps);
            $res->bindValue("ID_1", $this->id_area);
            $res->bindValue("ID_2", $this->id_city);
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

    public function getAll_staff(){
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
