<?php
namespace App;
class team_educators extends connect{
    private $guardar = 'INSERT INTO team_educators(id, name_rol) VALUES (:ID, :nombre_papel)';
    private $solicitar = 'SELECT id AS "ID", name_rol AS "nombre_papel" FROM team_educators';
    private $actualizar = 'UPDATE team_educators SET name_rol = :nombre_papel WHERE id = :ID';
    private $eliminar = 'DELETE FROM team_educators WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $name_rol = 1){
        parent::__construct();
    }

    public function deleteAll_team_educators(){
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

    public function postAll_team_educators(){
        try{
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_papel", $this->name_rol);
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

    public function putAll_team_educators(){
        try{
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_papel", $this->name_rol);
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

    public function getAll_team_educators(){
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