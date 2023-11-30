<?php 
require_once ("../config/DBController.php");
class Stock {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addStock($codigoZapatilla, $stockMinimo, $stockMaximo) {
        $query = "INSERT INTO stock_limite (codigoZapatilla, stockMinimo, stockMaximo) 
        VALUES (?, ?, ?)";
        $paramType = "sii";
        $paramValue = array(
            $codigoZapatilla, $stockMinimo, $stockMaximo
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editStock($codigoZapatilla, $stockMinimo, $stockMaximo, $codigoStock) {
        $query = "UPDATE stock_limite SET codigoZapatilla  = ?, stockMinimo  = ?, stockMaximo  = ? WHERE codigoStock = ?";
        $paramType = "iiii";
        $paramValue = array(
            $codigoZapatilla,
            $stockMinimo,
            $stockMaximo,
            $codigoStock
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteStock($codigoStock) {
        $query = "DELETE FROM stock_limite WHERE codigoStock = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoStock
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getStockByCodigo($codigoStock) {
        $query = "SELECT  codigoStock,
        CONCAT(Z.marca, ' - ', Z.modelo ,' - ',Z.color, ' - ', Z.talla) AS codigoZapatilla ,
        stockMinimo,
        stockMaximo
        FROM stock_limite
        inner join zapatilla z on z.codigoZapatilla = stock.codigoZapatilla
        WHERE codigoStock = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoStock
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getallStock() {
        $sql = "SELECT 
        codigoStock,
        CONCAT(Z.marca, ' - ', Z.modelo ,' - ',Z.color, ' - ', Z.talla) AS codigoZapatilla ,
        -- IF((ISNULL(((SELECT sum(cantidad) FROM detallecomprazapatilla where codigoZapatilla = stock.codigoZapatilla) - 
		-- (SELECT sum(cantidad) FROM detalleventazapatilla where codigoZapatilla = stock.codigoZapatilla))))=0, 
        -- ((SELECT sum(cantidad) FROM detallecomprazapatilla where codigoZapatilla = stock.codigoZapatilla) - 
		-- (SELECT sum(cantidad) FROM detalleventazapatilla where codigoZapatilla = stock.codigoZapatilla)),0)
		-- stockActual,
        stockMinimo,
        stockMaximo
        FROM stock_limite
        inner join zapatilla z on z.codigoZapatilla = stock.codigoZapatilla
         order by codigoStock desc";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
  }
}
?>