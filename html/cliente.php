<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Robust admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, robust admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>CASA DE ZAPATILLAS</title>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" href="../css/tablas.css">
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="../app-assets/fonts/icomoon.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/fonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/pace.css">
    <link rel="stylesheet" href="../app-assets/css/bootstrap.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN ROBUST CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/app.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <!-- END ROBUST CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-overlay-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END Custom CSS-->

    <!-- BEGIN Estilos Tablas CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/css/estilosTablas.css">


  </head>
  <body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">

        <!-- navbar-fixed-top-->
        <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
            <!-- falta insertar logo del proyecto -->
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
            <ul class="nav navbar-nav">
              <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5">         </i></a></li>
                        </ul>
            <ul class="nav navbar-nav float-xs-right">
              <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img src="../app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span><span class="user-name">John Doe</span></a>
                <div class="dropdown-menu dropdown-menu-right"><a href="#" class="dropdown-item"><i class="icon-head"></i> Edit Profile</a>
                  <div class="dropdown-divider"></div><a href="#" class="dropdown-item"><i class="icon-power3"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <!-- ////////////////////////////////////////////////////////////////////////////-->


    <!-- main menu-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-dark menu-accordion menu-shadow">
      <!-- / main menu header-->
      <!-- main menu content-->
      <div class="main-menu-content">
      <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li class=" nav-item"><a href="<?php $puertoweb ?>/proyecto/html/Menu.php" data-i18n="nav.dash.main" class="menu-item">Inicio</a>
                </li>

        <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
          <li class=" nav-item"><a href="index.html"><i class="icon-home3"></i><span data-i18n="nav.dash.main" class="menu-title">Ventas</span></a>
            <ul class="menu-content">
              <li class="nav-item"><a href="<?php $puertoweb ?>/proyecto/html/VentaZapatilla.php" data-i18n="nav.dash.main" class="menu-item">Venta de Zapatillas</a>
              </li>
            </ul>
          </li>
          
          <li class=" nav-item"><a href="#"><i class="icon-briefcase4"></i><span data-i18n="nav.project.main" class="menu-title">Mantenimientos</span></a>
            <ul class="menu-content">
              <li><a href="<?php $puertoweb ?>/proyecto/html/Empleado.php" data-i18n="nav.invoice.invoice_template" class="menu-item">Empleados</a>
              </li>

              <li><a href="<?php $puertoweb ?>/proyecto/html/Stock.php" data-i18n="nav.search_pages.search_page" class="menu-item">Stock</a>
              </li>
              <li><a href="<?php $puertoweb ?>/proyecto/html/Cargo.php" data-i18n="nav.search_pages.search_website" class="menu-item">Cargos</a>
              </li>
              <li><a href="<?php $puertoweb ?>/proyecto/html/Zapatilla.php" data-i18n="nav.login_register_pages.login_simple" class="menu-item">Zapatillas</a>
              </li>
              <li><a href="<?php $puertoweb ?>/proyecto/html/Cliente.php" data-i18n="nav.login_register_pages.register_simple" class="menu-item">Clientes</a>
              </li>
              <li><a href="<?php $puertoweb ?>/proyecto/html/EmpresaFacturar.php" data-i18n="nav.dash.main" class="menu-item">Empresa a Facturar</a>
              </li>
            </ul>
      </div>
    </div>
    <!-- / main menu-->

    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
<div class="row match-height">
    <div class="col-xl-12 col-md-12 col-sm-12">
        <div class="card" style="height: 440px;">
        <!--  -->
        <div style="text-align: right; margin: 20px 0px 10px;">
        <?php 
        require_once "../model/Cliente.php";
        $db_handle = new DBController();
        $cliente = new Cliente();
        $result = $cliente->getallCliente();
        require_once "../html/cliente.php";
        ?>
          <a id="btnAddAction" href="../config/PrincipalAcciones.php?action=Cliente-add"><img src="../image/icon-add.png" />Agregar Cliente</a>
        </div>
        <div id="toys-grid">
        <div class="table-responsive">
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th><strong>CODIGO CLIENTE</strong></th>
                    <th><strong>NOMBRES</strong></th>
                    <th><strong>APELLIDOS</strong></th>
                    <th><strong>SEXO</strong></th>
                    <th><strong>FECHA DE NACIMIENTO</strong></th>
                    <th><strong>DNI</strong></th>
                    <th><strong>ESTADO</strong></th>

                </tr>
            </thead>
            <tbody>
                    <?php
                    if (! empty($result)) {
                        foreach ($result as $k => $v) {
                            ?>
          <tr>
                    <td><?php echo $result[$k]["codigoCliente"]; ?></td>
                    <td><?php echo $result[$k]["nombres"]; ?></td>
                    <td><?php echo $result[$k]["apellidos"]; ?></td>
                    <td><?php echo $result[$k]["sexo"]; ?></td>
                    <td><?php echo $result[$k]["fechaNacimiento"]; ?></td>
                    <td><?php echo $result[$k]["dni"]; ?></td>
                    <td><?php echo $result[$k]["estado"]; ?></td>
                                   <!-- COMENZAR INSTRUCCION DE ASIGNAR DATOS EN EL EDITAR -->
                   
                    <?php
                    if (!empty($_GET["action"])) {
                      $action = $_GET["action"];
                  }else{$action = "peru";
                  }
                  switch ($action) {
                    case "Cliente-edit":
                      $codigoCliente  = $_GET["codigoCliente"];
                      $cliente = new Cliente();                   
                      if (isset($_POST['add'])) {
                          $nombres = $_POST['nombres'];
                          $apellidos = $_POST['apellidos'];
                          $sexo = $_POST['sexo'];
                          $fechaNacimiento = $_POST['fechaNacimiento'];
                          $dni = $_POST['dni'];
                          $estado = $_POST['estado'];
                          $cliente->editCliente($nombres, $apellidos, $sexo, $fechaNacimiento, $dni, $estado, $codigoCliente);                      
                      }
                      
                      $result = $cliente->getClienteByCodigo($codigoCliente);
                      require_once "../editar/Cliente-edit.php"; 
                      break;    
                    }                 
                    ?>
                  
                    <td><a class="btnEditAction" 
                        href="../config/PrincipalAcciones.php?action=Cliente-edit&codigoCliente=<?php echo $result[$k]["codigoCliente"]; ?>">
                        <img src="../image/icon-edit.png" />
                        </a>
                        <a onclick="return confirm('Confirma Eliminar Registro?');" class="btnDeleteAction" 
                        href="../config/PrincipalAcciones.php?action=Cliente-delete&codigoCliente=<?php echo $result[$k]["codigoCliente"]; ?>">
                        <img src="../image/icon-delete.png" />
                        </a>
                    </td>
                                
                </tr>
                    <?php
                        }
                    }
                    ?>
                
            
            
            <tbody>
        
        </table>
        </div>
    </div>
        </div>
    </div>
</div>

        </div>
      </div>
    </div>
    
    
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="../app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>
    <script src="../app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>
    <script src="../app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="../app-assets/vendors/js/charts/chart.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN ROBUST JS-->
    <script src="../app-assets/js/core/app-menu.js" type="text/javascript"></script>
    <script src="../app-assets/js/core/app.js" type="text/javascript"></script>
    <!-- END ROBUST JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!--<script src="../app-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>-->
    <!-- END PAGE LEVEL JS-->
  </body>
</html>
