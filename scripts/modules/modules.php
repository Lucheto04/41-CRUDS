<?php
namespace App;
class modules extends connect {
    private $guardar = 'INSERT INTO modules(id, name_module, start_date, end_date, description, duration_days, id_theme) VALUES (:ID, :nombre_modulo, :inicio, :final, :descripcion, :_dias, :ID_1)';
    private $solicitar = 'SELECT id AS "ID", name_module AS "nombre_modulo", start_date AS "inicio", end_date AS "final", description AS "descripcion", duration_days AS "_dias", id_theme AS "ID_1" FROM modules';
    private $actualizar = 'UPDATE modules SET name_module = :nombre_modulo, start_date = :inicio,  end_date = :final,  description = :descripcion, duration_days = :_dias, id_theme = :ID_1 WHERE id = :ID';
    private $eliminar = 'DELETE FROM modules WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $name_module = 1,public $start_date = 1,public $end_date = 1,public $description = 1, public $duration_days = 1, public $id_theme =1){
        parent::__construct();
    } 
    // [ID] => 1
    // [nombre_modulo] => HTML ATTRIBUTE MOD 1
    // [inicio] => 2023-02-27
    // [final] => 2023-03-01
    // [descripcion] => All HTML elements can have attributes
    // [_dias] => 3
    // [ID_1] => 1
    public function deleteAll_modules() {
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

    public function postAll_modules() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_modulo", $this->name_module);
            $res->bindValue("inicio", $this->start_date);
            $res->bindValue("final", $this->end_date);
            $res->bindValue("descripcion", $this->description);
            $res->bindValue("_dias", $this->duration_days);
            $res->bindValue("ID_1", $this->id_theme);
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

    public function putAll_modules() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_modulo", $this->name_module);
            $res->bindValue("inicio", $this->start_date);
            $res->bindValue("final", $this->end_date);
            $res->bindValue("descripcion", $this->description);
            $res->bindValue("_dias", $this->duration_days);
            $res->bindValue("ID_1", $this->id_theme);
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

    public function getAll_modules(){
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
