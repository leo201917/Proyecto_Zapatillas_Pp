<?php 
require_once ("../config/DBController.php");
class VentaZapatilla {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addVentaZapatilla($codigoEmpresaFacturar, $codigoCliente, $fechaEmision, $estadoComprobante, $tipoMoneda) {
        $query = "INSERT INTO ventazapatilla (codigoEmpresaFacturar, codigoCliente, fechaEmision, estadoComprobante, tipoMoneda)
        VALUES (?, ?, ?, ?, ?)";
        $paramType = "iisss";
        $paramValue = array(
            $codigoEmpresaFacturar, $codigoCliente, $fechaEmision, $estadoComprobante, $tipoMoneda
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editVentaZapatilla($codigoEmpresaFacturar, $codigoCliente, $fechaEmision, $estadoComprobante, $tipoMoneda, $codigoVentaZapatilla) {
        $query = "UPDATE ventazapatilla SET codigoEmpresaFacturar  = ?, codigoCliente = ?, fechaEmision = ?, estadoComprobante = ?, tipoMoneda = ? WHERE codigoVentaZapatilla = ?";
        $paramType = "iisssi";
        $paramValue = array(
            $codigoEmpresaFacturar, $codigoCliente, $fechaEmision, $estadoComprobante, $tipoMoneda, $codigoVentaZapatilla
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteVentaZapatilla($codigoVentaZapatilla) {
        $query = "DELETE FROM ventazapatilla WHERE codigoVentaZapatilla = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoVentaZapatilla
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getVentaZapatillaByCodigo($codigoVentaZapatilla) {
        $query = "SELECT * FROM ventazapatilla WHERE codigoVentaZapatilla = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoVentaZapatilla
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getallVentaZapatilla() {
      $sql = "SELECT 
      ventazapatilla.codigoVentaZapatilla,
      CONCAT(C.nombres, ' ', C.apellidos) AS codigoCliente,
      CONCAT(E.ruc, ' - ', E.razonSocial) AS codigoEmpresaFacturar,
      fechaEmision,
      estadoComprobante,
      tipoMoneda,
      sum(det.importeTotal)Monto
      FROM ventazapatilla 
      inner join cliente c on c.codigoCliente = ventazapatilla.codigoCliente
      inner join empresafacturar e on e.codigoEmpresaFacturar = ventazapatilla.codigoEmpresaFacturar
      inner join detalleventazapatilla det on  det.codigoVentaZapatilla = ventazapatilla.codigoVentaZapatilla
      group by ventazapatilla.codigoVentaZapatilla 
      order by ventazapatilla.codigoVentaZapatilla desc ";
      $result = $this->db_handle->runBaseQuery($sql);
      return $result;
  }
  function getUltimaVenta() {
    $sql = "SELECT
    codigoVentaZapatilla 
    FROM ventazapatilla order by codigoVentaZapatilla desc
LIMIT 1;";
    $result = $this->db_handle->runBaseQuery($sql);
    return $result;
}
}
?>