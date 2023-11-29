<?php 
require_once ("../config/DBController.php");
class Cargo {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addCargo($descripcion) {
        $query = "INSERT INTO cargo (descripcion) VALUES (?)";
        $paramType = "s";
        $paramValue = array(
            $descripcion
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editCargo($descripcion, $codigoCargo) {
        $query = "UPDATE cargo SET descripcion  = ? WHERE codigoCargo = ?";
        $paramType = "si";
        $paramValue = array(
            $descripcion,
            $codigoCargo
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteCargo($codigoCargo) {
        $query = "DELETE FROM cargo WHERE codigoCargo = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoCargo
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getCargoByCodigo($codigoCargo) {
        $query = "SELECT * FROM cargo WHERE codigoCargo = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoCargo
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getallCargo() {
      $sql = "SELECT * FROM cargo order by codigoCargo desc ";
      $result = $this->db_handle->runBaseQuery($sql);
      return $result;
  }
}
?>