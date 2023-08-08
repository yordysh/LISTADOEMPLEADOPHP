<?php
session_start();
// require_once "./funciones/f_funcion.php";

$_SESSION["cod"] = $codusuario;
var_dump($codusuario);
$_SESSION["ofi"] = $oficina;
var_dump($oficina);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/responsiveListadoPersonal.css">
    <link rel="stylesheet" href="./css/sweetalert2.min.css">
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="./images/icon/labsabel.ico" type="images/png">

    <script src="./js/jquery-3.7.0.min.js"></script>


    <title>Covifarma</title>

</head>

<body>
    <nav class="nav">
        <i class="icon-menu navOpenBtn"></i>
        <a class="logo" href="./"><img src="./images/labsabel.png" alt=""></a>
        <ul class="nav-links">
            <div class="icon-cross navCloseBtn"></div>

    </nav>


    <main>
        <section>
            <div class="container g-4 row">
                <div class="row g-4 top-div">
                    <center><label class="title">LISTADO PERSONAL</label></center>
                </div>

                <div class="main">
                    <form method="post" action="" id="formularioListadoEmpleado">
                        <input type="hidden" id="vroficina" name="vroficina" value="<?php echo $oficina; ?>">
                        <input type="hidden" id="vrcodpersonal" name="vrcodpersonal" value="<?php echo $codusuario; ?>">
                        <!-- <input type="hidden" id="vroficina" name="vroficina" value="empleadosLista">
                        <input type="hidden" id="vrcodpersonal" name="vrcodpersonal" value="0010"> -->
                        <!-- Text input FECHA INICIO-->
                        <div class="form-outline mb-4">
                            <label class="form-label">Fecha Inicio</label>
                            <input type="date" id="fecha_inicio" class="form-control" name="fecha_inicio">
                        </div>

                        <!-- Text input FECHA FIN -->
                        <div class="form-outline mb-4">
                            <label class="form-label">Fecha Fin</label>
                            <input type="date" id="fecha_fin" class="form-control" name="fecha_inicio">
                        </div>

                        <!-- Submit button -->
                        <div class="d-grid  col-6 mx-auto bt-guardar">
                            <!-- <input type="hidden" id="taskId"> -->
                            <button id="boton" name="insert" class="btn btn-primary bt-guardar">Buscar</button>
                        </div>
                    </form>
                    <div id="tablaListaEmpleado" class="table-responsive " style="overflow: scroll;height: 600px; margin-top:20px;">
                        <table id="tbListaEmpleado" class="table table-sm mb-3 table-hover table_id">
                            <thead>
                                <tr>

                                    <th class="thtitulo" scope="col">FECHA</th>
                                    <th class="thtitulo" scope="col">CODIGO PERSONAL</th>
                                    <th class="thtitulo" scope="col">NOMBRE</th>
                                    <th class="thtitulo" scope="col">HORA INGRESO</th>
                                    <th class="thtitulo" scope="col">HORA SALIDA</th>
                                    <th class="thtitulo" scope="col">INGRESO MARCADO</th>
                                    <th class="thtitulo" scope="col">SALIDA MARCADA</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tablaEmpleadoLista">

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </section>
    </main>
    <footer class="bg-dark p-2 mt-5 text-light position-fixed bottom-0 w-100 text-center">
        Labsabell-2023
    </footer>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/sweetalert2.all.min.js"></script>
    <script src="./js/ajaxListadoEmpleado.js"></script>

</body>

</html>