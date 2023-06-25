<?php
namespace App;
class working_info extends connect {
    private $guardar = 'INSERT INTO working_info(id, id_staff, years_exp, months_exp, id_work_reference, id_personal_ref, start_contract, end_contract) VALUES (:ID, :ID_1, :experiencia_anual, :experiencia_mensual, :ID_2, :ID_3, :inicio_contrato, :fin_contrato)';
    private $solicitar = 'SELECT id AS "ID", id_staff AS "ID_1", years_exp AS "experiencia_anual", months_exp AS "experiencia_mensual", id_work_reference AS "ID_2", id_personal_ref AS "ID_3", start_contract AS "inicio_contrato", end_contract AS "fin_contrato" FROM working_info';
    private $actualizar = 'UPDATE working_info SET id_staff = :ID_1, years_exp = :experiencia_anual,  months_exp = :experiencia_mensual,  id_work_reference = :ID_2, id_personal_ref = :ID_3, start_contract = :inicio_contrato, end_contract = :fin_contrato WHERE id = :ID';
    private $eliminar = 'DELETE FROM working_info WHERE id = :ID';
    use getInstance;
    private $mensaje;
    function __construct(private $id = 1, public $id_staff = 1,public $years_exp = 1,public $months_exp = 1,public $id_work_reference = 1, public $id_personal_ref = 1,public $start_contract = 1, public $end_contract = 1){
        parent::__construct();
    } 

    public function deleteAll_working_info() {
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

    public function postAll_working_info() {
        try {
            $res = $this->conexion->prepare($this->guardar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_staff);
            $res->bindValue("experiencia_anual", $this->years_exp);
            $res->bindValue("experiencia_mensual", $this->months_exp);
            $res->bindValue("ID_2", $this->id_work_reference);
            $res->bindValue("ID_3", $this->id_personal_ref);
            $res->bindValue("inicio_contrato", $this->start_contract);
            $res->bindValue("fin_contrato", $this->end_contract);
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

    public function putAll_working_info() {
        try {
            $res = $this->conexion->prepare($this->actualizar);
            $res->bindValue("ID", $this->id);
            $res->bindValue("ID_1", $this->id_staff);
            $res->bindValue("experiencia_anual", $this->years_exp);
            $res->bindValue("experiencia_mensual", $this->months_exp);
            $res->bindValue("ID_2", $this->id_work_reference);
            $res->bindValue("ID_3", $this->id_personal_ref);
            $res->bindValue("inicio_contrato", $this->start_contract);
            $res->bindValue("fin_contrato", $this->end_contract);
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

    public function getAll_working_info(){
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
