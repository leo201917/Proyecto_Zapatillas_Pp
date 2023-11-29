<?php 
require_once ("../config/DBController.php");
class Zapatilla {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addZapatilla($marca, $modelo, $talla, $color, $precioOrigen, $porcentajeGanancia, $precioVenta) {
        $query = "INSERT INTO zapatilla (marca, modelo, talla, color, precioOrigen, porcentajeGanancia, precioVenta) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
        $paramType = "ssisddd";
        $paramValue = array(
            $marca, $modelo, $talla, $color, $precioOrigen, $porcentajeGanancia, $precioVenta
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editZapatilla($marca, $modelo, $talla, $color, $precioOrigen, $porcentajeGanancia, $precioVenta, $codigoZapatilla) {
        $query = "UPDATE zapatilla SET marca = ?, modelo  = ?, talla = ?, color = ?, precioOrigen = ?, porcentajeGanancia = ?, precioVenta = ? WHERE codigoZapatilla = ?";
        $paramType = "ssisdddi";
        $paramValue = array(
            $marca, $modelo, $talla, $color, $precioOrigen, $porcentajeGanancia, $precioVenta, $codigoZapatilla
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteZapatilla($codigoZapatilla) {
        $query = "DELETE FROM zapatilla WHERE codigoZapatilla = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoZapatilla
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getZapatillaByCodigo($codigoZapatilla) {
        $query = "SELECT * FROM zapatilla WHERE codigoZapatilla = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoZapatilla
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getallZapatilla() {
        $sql = "SELECT * from zapatilla order by codigoZapatilla desc ";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
  }
  
}
?>