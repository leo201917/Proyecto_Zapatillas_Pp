<head> 
  <link rel="stylesheet" type="text/css" href="../css/validar.css"> 
</head> 

<?php
$correo = $_POST['correo'];
$password = $_POST['password'];
session_start();
$_SESSION['correo'] = $correo;


// $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);

// $consulta="SELECT correo, password FROM empleados where correo = '$correo' and password = '$password'";
// $resultado =mysql_query($conn, $consulta);

// $filas = mysqli_num_rows($resultado);
        require_once "../model/Login.php";
        $db_handle = new DBController();
        $login = new Login();
        $result = $login->getSessionLogin($correo, $password);
        require_once "../html/validar.php";


if (! empty($result)) {
    header("Location: menu.php");
}else{
    ?>
    <?php
    include("login.php");
    ?>
    <div class="container">
        <div></div>
        <div>
        <h2>Ingresa las credenciales correctas</h2>
        </div>
        <div></div>
    </div>
    <?php
}
// mysqli_free_result($result);
?>