<?php
    require_once("config/conexion.php");
    if (isset($_POST["enviar"]) and $_POST["enviar"]=="si"){
        require_once("models/usuario.php");
        $usuario=new usuario();
        $usuario->login();
    }
?>
<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Vendors Min CSS -->
        <link rel="stylesheet" href="public\css\vendors.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="public\css\style.css">
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="public\css\responsive.css">
        <title>Acceso</title>
        <link rel="icon" type="image/png" href="public\img\favicon.png">
    </head>

    <body>
        <!-- Start Login Area -->
        <div class="login-area bg-image">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="login-form">
                        <div class="logo">
                            <a href="dashboard-analytics.html"><img src="public\img\logo.png" alt="image"></a>
                        </div>
                        <h2>Bienvenido</h2>
                        <form action="" method="post">

                            <?php
                                if (isset($_GET["m"])){
                                    switch ($_GET["m"]){
                                        case "1":
                                            ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Error!</strong> Sus datos estan incorrectos por favor verificar.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php
                                        break;

                                        case "2":
                                            ?>
                                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                    <strong>Error!</strong> Existen datos vacios por favor verificar.
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            <?php
                                        break;

                                    }
                                }
                            ?>

                            <div class="form-group">
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo Electronico">
                                <span class="label-title"><i class='bx bx-user'></i></span>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                <span class="label-title"><i class='bx bx-lock'></i></span>
                            </div>

                            <div class="form-group">
                                <div class="remember-forgot">
                                    <label class="checkbox-box">Recuerdame
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <input type="hidden" name="enviar" value="si">
                            <button type="submit" class="login-btn">Acceder</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Login Area -->

        <!-- Vendors Min JS -->
        <script src="public\js\vendors.min.js"></script>

        <!-- ApexCharts JS -->
        <script src="public\js\apexcharts\apexcharts.min.js"></script>
        <script src="public\js\apexcharts\apexcharts-stock-prices.js"></script>
        <script src="public\js\apexcharts\apexcharts-irregular-data-series.js"></script>
        <script src="public\js\apexcharts\apex-custom-line-chart.js"></script>
        <script src="public\js\apexcharts\apex-custom-pie-donut-chart.js"></script>
        <script src="public\js\apexcharts\apex-custom-area-charts.js"></script>
        <script src="public\js\apexcharts\apex-custom-column-chart.js"></script>
        <script src="public\js\apexcharts\apex-custom-bar-charts.js"></script>
        <script src="public\js\apexcharts\apex-custom-mixed-charts.js"></script>
        <script src="public\js\apexcharts\apex-custom-radialbar-charts.js"></script>
        <script src="public\js\apexcharts\apex-custom-radar-chart.js"></script>

        <!-- ChartJS -->
        <script src="public\js\chartjs\chartjs.min.js"></script>
        <div class="chartjs-colors"> <!-- To use template colors with Javascript -->
            <div class="bg-primary"></div>
            <div class="bg-primary-light"></div>
            <div class="bg-secondary"></div>
            <div class="bg-info"></div>
            <div class="bg-success"></div>
            <div class="bg-success-light"></div>
            <div class="bg-danger"></div>
            <div class="bg-warning"></div>
            <div class="bg-purple"></div>
            <div class="bg-pink"></div>
        </div>

        <!-- jvectormap Min JS -->
        <script src="public\js\jvectormap-1.2.2.min.js"></script>
        <!-- jvectormap World Mil JS -->
        <script src="public\js\jvectormap-world-mill-en.js"></script>
        <!-- Custom JS -->
        <script src="public\js\custom.js"></script>
    </body>
</html>