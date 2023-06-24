<?php
namespace App;
class areas extends connect{
    private $queryPost = 'INSERT INTO areas(id, name_area) VALUES (:ID, :nombre_area)';
    private $queryGetAll = 'SELECT id AS "ID", name_area AS "nombre_area" FROM areas';
    private $queryUpdate = 'UPDATE areas SET name_area = :nombre_area WHERE id = :ID';
    private $queryDelete = 'DELETE FROM areas WHERE id = :ID';
    use getInstance;
    private $message;
    function __construct(private $id = 1, public $name_area = 1){
        parent::__construct();
    }

    public function deleteAll_areas(){
        try{
            $res = $this->conexion->prepare($this->queryDelete);
            $res->bindValue("ID", $this->id);
            $res->execute();
            $this->message = ["Message" => "Se elimino correctamente"];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->message);
        }
    }

    public function postAll_areas(){
        try{
            $res = $this->conexion->prepare($this->queryPost);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_area", $this->name_area);
            $res->execute();
            $this->message = ["Message" => "Se añadio correctamente"];
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->message);
        }
    }

    public function putAll_areas(){
        try{
            $res = $this->conexion->prepare($this->queryUpdate);
            $res->bindValue("ID", $this->id);
            $res->bindValue("nombre_area", $this->name_area);
            $res->execute();
            if ($res->rowCount() > 0){
                $this->message = ["Message" => "Se actualizo correctamente"];
            }
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->message);
        }
    }

    public function getAll_areas(){
        try{
            $res = $this->conexion->prepare($this->queryGetAll);
            $res->execute();
            $this->message =$res->fetchAll(\PDO::FETCH_ASSOC);
        }   catch (\PDOException $e) {
            $this->message = ["Code" => $e->getCode(), "Message" => $res->errorInfo()[2]];
        }   finally {
            print_r($this->message);
        }
    }


}


?>