<?php 
require_once ("../config/DBController.php");
class EmpresaFacturar {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addEmpresaFacturar($ruc, $razonSocial, $direccionFiscal, $estadoEmpresa) {
        $query = "INSERT INTO empresafacturar (ruc, razonSocial, direccionFiscal, estadoEmpresa) VALUES (?, ?, ?, ?)";
        $paramType = "ssss";
        $paramValue = array(
            $ruc, $razonSocial, $direccionFiscal, $estadoEmpresa
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editEmpresaFacturar($ruc, $razonSocial, $direccionFiscal, $estadoEmpresa, $codigoEmpresaFacturar) {
        $query = "UPDATE empresafacturar SET ruc  = ?, razonSocial = ?, direccionFiscal = ?, estadoEmpresa = ? WHERE codigoEmpresaFacturar = ?";
        $paramType = "ssssi";
        $paramValue = array(
            $ruc, $razonSocial, $direccionFiscal, $estadoEmpresa, $codigoEmpresaFacturar
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteEmpresaFacturar($codigoEmpresaFacturar) {
        $query = "DELETE FROM empresafacturar WHERE codigoEmpresaFacturar = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoEmpresaFacturar
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getEmpresaFacturarByCodigo($codigoEmpresaFacturar) {
        $query = "SELECT * FROM empresafacturar WHERE codigoEmpresaFacturar = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoEmpresaFacturar
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getallEmpresaFacturar() {
      $sql = "SELECT * FROM empresafacturar order by codigoEmpresaFacturar desc ";
      $result = $this->db_handle->runBaseQuery($sql);
      return $result;
  }
}
?>