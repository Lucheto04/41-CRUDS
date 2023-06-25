<?php
namespace App;
class routes extends connect {
    private $guardar = 'INSERT INTO routes(id, name_route, start_date, end_date, description, duration_month) VALUES (:ID, :nombre, :inicio, :fin, :descripcion, :duracion)';
    private $solicitar = 'SELECT id AS "ID", name_route AS "nombre", start_date AS "inicio", end_date AS "fin", description AS "descripcion", duration_month AS "duracion" FROM routes';
    private $actualizar = 'UPDATE routes SET name_route = :nombre, start_date = :inicio,  end_date = :fin,  description = :descripcion, duration_month = :duracion WHERE id = :ID';
    private $eliminar = 'DELETE FROM routes WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $name_route = 1,public $start_date = 1,public $end_date = 1,public $description = 1, public $duration_month = 1){
        parent::__construct();
    } 

    public function deleteAll_routes() {
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

    public function postAll_routes() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre", $this->name_route);
            $res->bindValue("inicio", $this->start_date);
            $res->bindValue("fin", $this->end_date);
            $res->bindValue("descripcion", $this->description);
            $res->bindValue("duracion", $this->duration_month);
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

    public function putAll_routes() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre", $this->name_route);
            $res->bindValue("inicio", $this->start_date);
            $res->bindValue("fin", $this->end_date);
            $res->bindValue("descripcion", $this->description);
            $res->bindValue("duracion", $this->duration_month);
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

    public function getAll_routes(){
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
