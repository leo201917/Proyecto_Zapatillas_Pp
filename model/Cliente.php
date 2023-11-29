<?php 
require_once ("../config/DBController.php");
class Cliente {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addCliente($nombres, $apellidos, $sexo, $fechaNacimiento, $dni, $estado) {
        $query = "INSERT INTO cliente (nombres, apellidos, sexo, fechaNacimiento, dni, estado) VALUES (?, ?, ?, ?, ?, ?)";
        $paramType = "ssssss";
        $paramValue = array(
            $nombres,
            $apellidos,
            $sexo,
            $fechaNacimiento,
            $dni,
            $estado
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editCliente($nombres, $apellidos, $sexo, $fechaNacimiento, $dni, $estado, $codigoCliente) {
        $query = "UPDATE cliente SET nombres  = ?, apellidos  = ?, sexo  = ?, fechaNacimiento  = ?, dni  = ?, estado = ? WHERE codigoCliente = ?";
        $paramType = "ssssssi";
        $paramValue = array(
            $nombres,
            $apellidos,
            $sexo,
            $fechaNacimiento,
            $dni,
            $estado,
            $codigoCliente
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteCliente($codigoCliente) {
        $query = "DELETE FROM cliente WHERE codigoCliente = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoCliente
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getClienteByCodigo($codigoCliente) {
        $query = "SELECT * FROM cliente WHERE codigoCliente = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoCliente
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getallCliente() {
      $sql = "SELECT * FROM cliente order by codigoCliente desc ";
      $result = $this->db_handle->runBaseQuery($sql);
      return $result;
  }
}
?>