<?php
    require_once("../../config/conexion.php");
    if (isset($_SESSION["usu_id"])){
?>
<!doctype html>
<html lang="es">
    <head>
        <?php require_once("../html/MainHead.php") ?>
        <title>Mnt Usuario</title>
    </head>

    <body>
        <!-- Start Sidemenu Area -->
        <?php require_once("../html/MainMenu.php") ?>
        <!-- End Sidemenu Area -->

        <!-- Start Main Content Wrapper Area -->
        <div class="main-content d-flex flex-column">

            <!-- Top Navbar Area -->
            <?php require_once("../html/MainNavbar.php")?>
            <!-- End Top Navbar Area -->

            <!-- Breadcrumb Area -->
            <div class="breadcrumb-area">
                <h1>Mnt Usuario</h1>

                <ol class="breadcrumb">
                    <li class="item"><a href="../home/"><i class='bx bx-home-alt'></i></a></li>

                    <li class="item">Mantenimiento de Usuario</li>
                </ol>
            </div>

            <div class="card mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Listado de Usuario</h3>
                </div>

                <div class="card-body">
                    <table id="usuario_data" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th>Correo Electronico</th>
                                <th>Estado</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>

            <!-- End Breadcrumb Area -->

            <div class="flex-grow-1"></div>

            <!-- Start Footer End -->
            <?php require_once("../html/MainFooter.php")?>
            <!-- End Footer End -->

        </div>
        <!-- End Main Content Wrapper Area -->

        <?php require_once("../html/MainJs.php")?>
        <script type="text/javascript" src="mntusuario.js"></script>
    </body>
</html>
<?php
    }else{
        header("Location:".Conectar::ruta()."../../index.php");
    }
?>