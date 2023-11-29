<?php 
require_once ("../config/DBController.php");
class Login {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    

    
    function getSessionLogin($correo, $password) {
        $query = "SELECT * FROM empleados where correo = ? and password = ?";
        $paramType = "ss";
        $paramValue = array(
            $correo,
            $password
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
   
}
?>