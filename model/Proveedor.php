<?php 
require_once ("../config/DBController.php");
class Proveedor {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addProveedor($razonSocial, $telefono, $correo, $direccion, $estado) {
        $query = "INSERT INTO proveedor (razonSocial, telefono, correo, direccion, estado) 
        VALUES (?, ?, ?, ?, ?)";
        $paramType = "sssss";
        $paramValue = array(
            $razonSocial, $telefono, $correo, $direccion, $estado
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editProveedor($razonSocial, $telefono, $correo, $direccion, $estado, $codigoProveedor) {
        $query = "UPDATE proveedor SET razonSocial  = ?, telefono = ?, correo = ?, direccion = ?, estado = ? WHERE codigoProveedor = ?";
        $paramType = "sssssi";
        $paramValue = array(
            $razonSocial, $telefono, $correo, $direccion, $estado, $codigoProveedor
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteProveedor($codigoProveedor) {
        $query = "DELETE FROM proveedor WHERE codigoProveedor = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoProveedor
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getProveedorByCodigo($codigoProveedor) {
        $query = "SELECT * FROM proveedor WHERE codigoProveedor = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoProveedor
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getallProveedor() {
        $sql = "SELECT * FROM proveedor order by codigoProveedor desc ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
  }
}
?>