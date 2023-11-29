<?php 
require_once ("../config/DBController.php");
class Empleado {
    private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }
    
    function addEmpleado($codigoCargo, $nombres, $apellidos, $correo, $password, $sexo, $fechaNacimiento, $dni , $sueldo, $estado) {
        $query = "INSERT INTO empleados (codigoCargo, nombres, apellidos, correo, password, sexo, fechaNacimiento, dni, sueldo, estado) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $paramType = "isssssssds";
        $paramValue = array(
            $codigoCargo, $nombres, $apellidos, $correo, $password, $sexo, $fechaNacimiento, $dni, $sueldo, $estado
        );
        
        $insertId = $this->db_handle->insert($query, $paramType, $paramValue);
        return $insertId;
    }

    function editEmpleado($codigoCargo, $nombres, $apellidos, $correo, $password, $sexo, $fechaNacimiento, $dni, $sueldo, $estado, $codigoEmpleado) {
        $query = "UPDATE empleados SET codigoCargo  = ?, nombres  = ?, apellidos  = ?, correo  = ?, password  = ?, sexo  = ?, fechaNacimiento  = ?, dni  = ?, sueldo  = ?, estado = ? WHERE codigoEmpleado = ?";
        $paramType = "isssssssdsi";
        $paramValue = array(
            $codigoCargo, $nombres, $apellidos, $correo, $password, $sexo, $fechaNacimiento, $dni, $sueldo, $estado, $codigoEmpleado
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function deleteEmpleado($codigoEmpleado) {
        $query = "DELETE FROM empleados WHERE codigoEmpleado = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoEmpleado
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }
    
    function getEmpleadoByCodigo($codigoEmpleado) {
        $query = "SELECT * FROM empleados WHERE codigoEmpleado = ?";
        $paramType = "i";
        $paramValue = array(
            $codigoEmpleado
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }
    function getallEmpleado() {
      $sql = "SELECT 
      codigoEmpleado, 
      c.descripcion as codigoCargo,
      nombres,
      apellidos, 
      correo,
      '******' as password,
      sexo,
      fechaNacimiento,
      dni,
      sueldo,
      estado
      FROM empleados inner JOIN cargo c on c.codigoCargo = empleados.codigoCargo order by codigoEmpleado desc ";
      $result = $this->db_handle->runBaseQuery($sql);
      return $result;
  }
}
?>