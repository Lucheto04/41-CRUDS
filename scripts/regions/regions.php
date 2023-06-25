<?php
namespace App;
class regions extends connect {
    private $guardar = 'INSERT INTO regions( id, name_region, id_country) VALUES (:ID, :nombre_region, :ID_C)';
    private $solicitar = 'SELECT id AS "ID", name_region AS "nombre_region", id_country  AS "ID_C" FROM regions';
    private $actualizar = 'UPDATE regions SET name_region = :nombre_region, id_country= :ID_C WHERE id = :ID';
    private $eliminar = 'DELETE FROM regions WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $name_region = 1, public $id_country = 1){
        parent::__construct();
    }

    public function deleteAll_regions(){
        try{
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

    public function postAll_regions(){
        try{
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_region", $this->name_region);
            $res->bindValue("ID_C", $this->id_country);
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

    public function putAll_regions(){
        try{
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_region", $this->name_region);
            $res->bindValue("ID_C", $this->id_country);
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

    public function getAll_regions(){
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