<?php
require ("DBController.php");
require ("../model/Cargo.php");
require ("../model/Proveedor.php");
require ("../model/Zapatilla.php");
require ("../model/Cliente.php");
require ("../model/Stock.php");
require ("../model/Empleado.php");
require ("../model/EmpresaFacturar.php");
require ("../model/VentaZapatilla.php");
require ("../model/DetalleVentaZapatilla.php");
require ("../model/Reporte.php");


$db_handle = new DBController();
// $action = "";
if (!empty($_GET["action"])) {
    $action = $_GET["action"];
}else{$action = "peru";
}
switch ($action) {

        case "Cargo":
        // $db_handle = new DBController();
        $cargo = new Cargo();
        $result = $cargo->getallCargo();
        require_once "../html/cargo.php";
        break;

        case "Cargo-add":
            
        if (isset($_POST['add'])) {
            $descripcion = $_POST['descripcion'];
            $cargo = new Cargo();
            $insertId = $cargo->addCargo($descripcion);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema al agregar un nuevo registro",
                    "type" => "error"
                );
            } else {
                header("Location: ../html/cargo.php");
            }
        }
        require_once "../agregar/Cargo-add.php";

        break;
        
        case "Cargo-edit":

        $codigoCargo = $_GET["codigoCargo"];
        $cargo = new Cargo();
        
        if (isset($_POST['add'])) {
            $descripcion = $_POST['descripcion'];                   
            $cargo->editCargo($descripcion, $codigoCargo);         
            header("Location: ../html/cargo.php");
        }
        
        $result = $cargo->getCargoByCodigo($codigoCargo);
        require_once  "../editar/Cargo-edit.php";
        break;

        case "Cargo-delete":
            $cargo_codigoCargo = $_GET["codigoCargo"];
            $cargo = new Cargo();
            
            $cargo->deleteCargo($cargo_codigoCargo);
            
            $result = $cargo->getallCargo();
            require_once "../html/cargo.php";
            break;
        
        case "Proveedor-add":
            
        if (isset($_POST['add'])) {
            $razonSocial = $_POST['razonSocial'];
            $telefono = $_POST['telefono'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $estado = $_POST['estado'];
            $proveedor = new Proveedor();
            $insertId = $proveedor->addProveedor($razonSocial, $telefono, $correo, $direccion, $estado);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema al agregar un nuevo registro",
                    "type" => "error"
                );
            } else {
                header("Location: ../html/proveedor.php");
            }
        }
        require_once "../agregar/Proveedor-add.php";

        break;

        case "Proveedor-edit":

            $codigoProveedor = $_GET["codigoProveedor"];
            $proveedor = new Proveedor();
            
            if (isset($_POST['add'])) {
                $razonSocial = $_POST['razonSocial'];
                $telefono = $_POST['telefono'];
                $correo = $_POST['correo'];
                $direccion = $_POST['direccion'];
                $estado = $_POST['estado'];                   
                $proveedor->editProveedor($razonSocial, $telefono, $correo, $direccion, $estado, $codigoProveedor);         
                header("Location: ../html/proveedor.php");
            }
            
            $result = $proveedor->getProveedorByCodigo($codigoProveedor);
            require_once  "../editar/Proveedor-edit.php";
            break;
        
        case "Proveedor-delete":
            $proveedor_codigoProveedor = $_GET["codigoProveedor"];
            $proveedor = new Proveedor();
            
            $proveedor->deleteProveedor($proveedor_codigoProveedor);
            
            $result = $proveedor->getallProveedor();
            require_once "../html/proveedor.php";
            break;

        case "Zapatilla-add":
            
        if (isset($_POST['add'])) {
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $talla = $_POST['talla'];
            $color = $_POST['color'];
            $precioOrigen = $_POST['precioOrigen'];
            $porcentajeGanancia = $_POST['porcentajeGanancia'];
            $precioVenta = $_POST['precioVenta'];
            $zapatilla = new Zapatilla();
            $insertId = $zapatilla->addZapatilla($marca, $modelo, $talla, $color, $precioOrigen, $porcentajeGanancia, $precioVenta);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema al agregar un nuevo registro",
                    "type" => "error"
                );
            } else {
                header("Location: ../html/zapatilla.php");
            }
        }
        require_once "../agregar/Zapatilla-add.php";

        break;

        case "Zapatilla-edit":

            $codigoZapatilla = $_GET["codigoZapatilla"];
            $zapatilla = new Zapatilla();
            
            if (isset($_POST['add'])) {
                $marca = $_POST['marca'];
                $modelo = $_POST['modelo'];
                $talla = $_POST['talla'];
                $color = $_POST['color'];
                $precioOrigen = $_POST['precioOrigen'];
                $porcentajeGanancia = $_POST['porcentajeGanancia'];
                $precioVenta = $_POST['precioVenta'];                   
                $zapatilla->editZapatilla($marca, $modelo, $talla, $color, $precioOrigen, $porcentajeGanancia, $precioVenta, $codigoZapatilla);         
                header("Location: ../html/zapatilla.php");
            }
            
            $result = $zapatilla->getZapatillaByCodigo($codigoZapatilla);
            require_once  "../editar/Zapatilla-edit.php";
            break;
        
        case "Zapatilla-delete":
            $zapatilla_codigoZapatilla = $_GET["codigoZapatilla"];
            $zapatilla = new Zapatilla();
            
            $zapatilla->deleteZapatilla($zapatilla_codigoZapatilla);
            
            $result = $zapatilla->getallZapatilla();
            require_once "../html/zapatilla.php";
            break;

        case "Cliente-add":
        if (isset($_POST['add'])) {
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $sexo = $_POST['sexo'];
            $fechaNacimiento = "";
            if ($_POST["fechaNacimiento"]) {
                $fechaNacimiento_timestamp = strtotime($_POST["fechaNacimiento"]);
                $fechaNacimiento = date("Y-m-d", $fechaNacimiento_timestamp);
            }
            $dni = $_POST['dni'];
            $estado = $_POST['estado'];
            
            $cliente = new Cliente();
            $insertId = $cliente->addCliente($nombres, $apellidos, $sexo, $fechaNacimiento, $dni, $estado);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema al agregar un nuevo registro",
                    "type" => "error"
                );
            } else {
                header("Location: ../html/cliente.php");
            }
        }
        require_once "../agregar/Cliente-add.php";
        break;
            
        case "Cliente-edit":

            $codigoCliente = $_GET["codigoCliente"];
            $cliente = new Cliente();
            
            if (isset($_POST['add'])) {
                $nombres = $_POST['nombres'];
                $apellidos = $_POST['apellidos'];
                $sexo = $_POST['sexo'];
                $fechaNacimiento = $_POST['fechaNacimiento'];
                $dni = $_POST['dni'];
                $estado = $_POST['estado'];              
                $cliente->editCliente($nombres, $apellidos, $sexo, $fechaNacimiento, $dni, $estado, $codigoCliente);         
                header("Location: ../html/cliente.php");
            }
            
            $result = $cliente->getClienteByCodigo($codigoCliente);
            require_once  "../editar/Cliente-edit.php";
            break;

        case "Cliente-delete":
            $cliente_codigoCliente = $_GET["codigoCliente"];
            $cliente = new Cliente();
            
            $cliente->deleteCliente($cliente_codigoCliente);
            
            $result = $cliente->getallCliente();
            require_once "../html/cliente.php";
            break;

        case "Stock-add":
            
        if (isset($_POST['add'])) {
            $codigoZapatilla = $_POST['codigoZapatilla'];
            $stockMinimo = $_POST['stockMinimo'];
            $stockMaximo = $_POST['stockMaximo'];
            $stock_limite = new Stock();
            $insertId = $stock_limite->addStock($codigoZapatilla, $stockMinimo, $stockMaximo);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema al agregar un nuevo registro",
                    "type" => "error"
                );
            } else {
                header("Location: ../html/stock.php");
            }
        }
        require_once "../agregar/Stock-add.php";

        break;

        case "Stock-edit":
                $codigoStock = $_GET["codigoStock"];
                $stock_limite = new Stock();
                
                if (isset($_POST['add'])) {
                    $codigoZapatilla = $_POST['codigoZapatilla'];
                    $stockMinimo = $_POST['stockMinimo'];
                    $stockMaximo = $_POST['stockMaximo'];            
                    $stock_limite->editStock($codigoZapatilla, $stockMinimo, $stockMaximo, $codigoStock);         
                    header("Location: ../html/stock.php");
                }
                
                $result = $stock->getStockByCodigo($codigoStock);
                require_once  "../editar/Stock-edit.php";
                break;

        case "Stock-delete":
            $stock_codigoStock = $_GET["codigoStock"];
            $stock_limite = new Stock();
            
            $stock_limite->deleteStock($stock_codigoStock);
            
            $result = $stock_limite->getallStock();
            require_once "../html/stock.php";
            break;

        case "Empleado-add":
            
        if (isset($_POST['add'])) {
            $codigoCargo = $_POST['codigoCargo'];
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $correo = $_POST['correo'];
            $password = $_POST['password'];
            $sexo = $_POST['sexo'];
            $fechaNacimiento = "";
            if ($_POST["fechaNacimiento"]) {
                $fechaNacimiento_timestamp = strtotime($_POST["fechaNacimiento"]);
                $fechaNacimiento = date("Y-m-d", $fechaNacimiento_timestamp);
            }
            $dni = $_POST['dni'];
            $sueldo = $_POST['sueldo'];
            $estado = $_POST['estado'];
            $empleado = new Empleado();
            $insertId = $empleado->addEmpleado($codigoCargo, $nombres, $apellidos, $correo, $password, $sexo, $fechaNacimiento, $dni, $sueldo, $estado);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema al agregar un nuevo registro",
                    "type" => "error"
                );
            } else {
                header("Location: ../html/empleado.php");
            }
        }
        require_once "../agregar/Empleado-add.php";

        break;

        case "Empleado-edit":
                $codigoEmpleado = $_GET["codigoEmpleado"];
                $empleado = new Empleado();
                
                if (isset($_POST['add'])) {
                    $codigoCargo = $_POST['codigoCargo'];
                    $nombres = $_POST['nombres'];
                    $apellidos = $_POST['apellidos'];
                    $correo = $_POST['correo'];
                    $password = $_POST['password'];
                    $sexo = $_POST['sexo'];
                    $fechaNacimiento = $_POST['fechaNacimiento'];
                    $dni = $_POST['dni'];
                    $sueldo = $_POST['sueldo'];
                    $estado = $_POST['estado'];            
                    $empleado->editEmpleado($codigoCargo, $nombres, $apellidos, $correo, $password, $sexo, $fechaNacimiento, $dni, $sueldo, $estado, $codigoEmpleado);         
                    header("Location: ../html/empleado.php");
                }
                
                $result = $empleado->getEmpleadoByCodigo($codigoEmpleado);
                require_once  "../editar/Empleado-edit.php";
                break;

        case "Empleado-delete":
            $empleado_codigoEmpleado = $_GET["codigoEmpleado"];
            $empleado = new Empleado();
            
            $empleado->deleteEmpleado($empleado_codigoEmpleado);
            
            $result = $empleado->getallEmpleado();
            require_once "../html/empleado.php";
            break;

        case "EmpresaFacturar-add":
            
        if (isset($_POST['add'])) {
            $ruc = $_POST['ruc'];
            $razonSocial = $_POST['razonSocial'];
            $direccionFiscal = $_POST['direccionFiscal'];
            $estadoEmpresa = $_POST['estadoEmpresa'];
            $empresaFacturar = new EmpresaFacturar();
            $insertId = $empresaFacturar->addEmpresaFacturar($ruc, $razonSocial, $direccionFiscal, $estadoEmpresa);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema al agregar un nuevo registro",
                    "type" => "error"
                );
            } else {
                header("Location: ../html/empresaFacturar.php");
            }
        }
        require_once "../agregar/EmpresaFacturar-add.php";

        break;
        
        case "EmpresaFacturar-edit":

        $codigoEmpresaFacturar = $_GET["codigoEmpresaFacturar"];
        $empresaFacturar = new EmpresaFacturar();
        
        if (isset($_POST['add'])) {
            $ruc = $_POST['ruc'];
            $razonSocial = $_POST['razonSocial'];
            $direccionFiscal = $_POST['direccionFiscal'];
            $estadoEmpresa = $_POST['estadoEmpresa'];
            $empresaFacturar->editEmpresaFacturar($ruc, $razonSocial, $direccionFiscal, $estadoEmpresa, $codigoEmpresaFacturar);         
            header("Location: ../html/empresaFacturar.php");
        }
        
        $result = $empresaFacturar->getEmpresaFacturarByCodigo($codigoEmpresaFacturar);
        require_once  "../editar/EmpresaFacturar-edit.php";
        break;

        case "EmpresaFacturar-delete":
            $empresaFacturar_codigoEmpresaFacturar = $_GET["codigoEmpresaFacturar"];
            $empresaFacturar = new EmpresaFacturar();
            
            $empresaFacturar->deleteEmpresaFacturar($empresaFacturar_codigoEmpresaFacturar);
            
            $result = $empresaFacturar->getallEmpresaFacturar();
            require_once "../html/empresaFacturar.php";
            break;

        case "VentaZapatilla-add":
            
        if (isset($_POST['add'])) {
            $codigoEmpresaFacturar = $_POST['codigoEmpresaFacturar'];
            $codigoCliente = $_POST['codigoCliente'];
            $fechaEmision = $_POST['fechaEmision'];
            $estadoComprobante = $_POST['estadoComprobante'];
            $tipoMoneda = $_POST['tipoMoneda'];
            $ventaZapatilla = new VentaZapatilla();
            $insertId = $ventaZapatilla->addVentaZapatilla($codigoEmpresaFacturar, $codigoCliente, $fechaEmision, $estadoComprobante, $tipoMoneda);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema al agregar un nuevo registro",
                    "type" => "error"
                );
                
            } else {
                header("Location: ../config/PrincipalAcciones.php?action=DetalleVentaZapatilla-add");
            }
        }
        require_once "../agregar/VentaZapatilla-add.php";

        break;

        case "VentaZapatilla-edit":
                $codigoVentaZapatilla = $_GET["codigoVentaZapatilla"];
                $ventaZapatilla = new VentaZapatilla();
                
                if (isset($_POST['add'])) {
                    $codigoEmpresaFacturar = $_POST['codigoEmpresaFacturar'];
                    $codigoCliente = $_POST['codigoCliente'];
                    $fechaEmision = $_POST['fechaEmision'];
                    $estadoComprobante = $_POST['estadoComprobante'];
                    $tipoMoneda = $_POST['tipoMoneda'];           
                    $ventaZapatilla->editVentaZapatilla($codigoEmpresaFacturar, $codigoCliente, $fechaEmision, $estadoComprobante, $tipoMoneda, $codigoVentaZapatilla);         
                    header("Location: ../html/ventaZapatilla.php");
                }
                
                $result = $ventaZapatilla->getVentaZapatillaByCodigo($codigoVentaZapatilla);
                require_once  "../editar/VentaZapatilla-edit.php";
                break;

        case "VentaZapatilla-report":
            $codigoVentaZapatilla = $_GET["codigoVentaZapatilla"];
            $reporte = new Reporte();
            $result = $reporte->getReport($codigoVentaZapatilla);
            require_once "../reporte/reporteVentas.php";
            break;

        case "DetalleVentaZapatilla-add":
            
        if (isset($_POST['add'])) {
            $codigoVentaZapatilla = $_POST['codigoVentaZapatilla'];
            $codigoZapatilla = $_POST['codigoZapatilla'];
            $cantidad = $_POST['cantidad'];
            $precioUnitario = $_POST['precioUnitario'];
            $subTotalVenta = $_POST['subTotalVenta'];
            $igv = $_POST['igv'];
            $importeTotal = $_POST['importeTotal'];
            $detalleVentaZapatilla = new DetalleVentaZapatilla();
            $insertId = $detalleVentaZapatilla->addDetalleVentaZapatilla($codigoVentaZapatilla, $codigoZapatilla, $cantidad, $precioUnitario, $subTotalVenta, $igv, $importeTotal);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema al agregar un nuevo registro",
                    "type" => "error"
                );
            } else {
                header("Location: ../html/ventaZapatilla.php");
            }
        }

        if (isset($_POST['continue'])) {
            $codigoVentaZapatilla = $_POST['codigoVentaZapatilla'];
            $codigoZapatilla = $_POST['codigoZapatilla'];
            $cantidad = $_POST['cantidad'];
            $precioUnitario = $_POST['precioUnitario'];
            $subTotalVenta = $_POST['subTotalVenta'];
            $igv = $_POST['igv'];
            $importeTotal = $_POST['importeTotal'];
            $detalleVentaZapatilla = new DetalleVentaZapatilla();
            $insertId = $detalleVentaZapatilla->addDetalleVentaZapatilla($codigoVentaZapatilla, $codigoZapatilla, $cantidad, $precioUnitario, $subTotalVenta, $igv, $importeTotal);
            if (empty($insertId)) {
                $response = array(
                    "message" => "Problema al agregar un nuevo registro",
                    "type" => "error"
                );
            } else {
                header("Location: ../config/PrincipalAcciones.php?action=DetalleVentaZapatilla-add");
            }
        }
        require_once "../agregar/DetalleVentaZapatilla-add.php";

        break;

        }

        

?>
