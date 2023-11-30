<?php 
require_once ("../config/DBController.php");
class DetalleVentaZapatilla {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    // prueba leonardo
    // changue
    function addDetalleVentaZapatilla($codigoVentaZapatilla, $codigoZapatilla, $cantidad, $precioUnitario, $subTotalVenta, $igv, $importeTotal) {
        $query = "INSERT INTO detalleventazapatilla (codigoVentaZapatilla, codigoZapatilla, cantidad, precioUnitario, subTotalVenta, igv, importeTotal)
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $paramType = "iiidddd";
        $paramValue = array(
            $codigoVentaZapatilla, $codigoZapatilla, $cantidad, $precioUnitario, $subTotalVenta, $igv, $importeTotal
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }
    
    function getDetalleVentaZapatillaByCodigo($codigoDetalleVentaZapatilla) {
        $query = "SELECT * FROM detalleventazapatilla WHERE codigoDetalleVentaZapatilla = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoDetalleVentaZapatilla
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
}
?>