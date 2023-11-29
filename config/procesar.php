<?php
if (isset($_POST['variableJS'])) {
    $valor = $_POST['variableJS'];
    // Hacer algo con la variable en PHP, por ejemplo, guardarla en una base de datos o procesarla de alguna manera.
    // Aquí, simplemente la devolvemos al cliente como ejemplo.
    require_once "../model/Zapatilla.php";
    $db_handle_z = new DBController();
    $zapatilla_z_ = new Zapatilla();
    $resultCombo_ = $zapatilla_z_->getZapatillaByCodigo($valor);
    foreach ($resultCombo_ as $k => $v) { 
        echo $resultCombo_[$k]["precioVenta"]; }
} else {
    echo "No se recibió ninguna variable.";
}
?>