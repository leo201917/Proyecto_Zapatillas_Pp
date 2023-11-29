<?php 
require_once ("../config/DBController.php");
class Reporte {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    function getReport($codigoVentaZapatilla) {
        $query = "SELECT 
        v.codigoVentaZapatilla codigoVentaZapatilla, v.fechaEmision fechaEmision, v.tipoMoneda tipoMoneda, 
        e.ruc ruc, e.razonSocial razonSocial, e.direccionFiscal direccionFiscal, 
        d.cantidad cantidad, d.precioUnitario precioUnitario, (d.importeTotal - d.igv) importeTotal,
        (select sum(subTotalVenta) from detalleventazapatilla where codigoventazapatilla = v.codigoVentaZapatilla) subTotal_Fact,
        (select sum(igv)  from detalleventazapatilla where codigoventazapatilla = v.codigoVentaZapatilla) igv_Fact,
        (select sum(importeTotal) from detalleventazapatilla where codigoventazapatilla = v.codigoVentaZapatilla) importeTotal_Fact,
        z.marca marca,z.modelo modelo, z.talla talla, z.color color,
		concat(c.nombres,' ' ,c.apellidos) nombres 
    FROM detalleventazapatilla d 
    inner join ventazapatilla V ON v.codigoventazapatilla = d.codigoVentaZapatilla 
    inner join empresafacturar e on e.codigoEmpresaFacturar = v.codigoEmpresaFacturar
    inner join cliente c on c.codigoCliente = v.codigoCliente
    inner join zapatilla z on z.codigoZapatilla = d.codigoZapatilla where v.codigoventazapatilla =?";
        $paramType = "i";
        $paramValue = array(
            $codigoVentaZapatilla  
        );       
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    } 
}
?>