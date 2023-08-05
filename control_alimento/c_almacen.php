<?php
require_once("./m_almacen.php");
include("../funciones/f_funcion.php");



if ($_POST['accion'] == 'buscarempleado') {

    $searchinicio = $_POST['searchinicio'];
    $searchfin = $_POST['searchfin'];
    $bd  = $_POST['empleadosLista'];
    $codPersonal  = $_POST['codPersonal'];

    $respuesta = c_almacen::c_buscar_empleado($bd, $codPersonal, $searchinicio, $searchfin);
    echo $respuesta;
}

// if ($_POST['accion'] == 'usuario') {
//     // session_start();
//     // $USUARIO = $_SESSION['usuario'];
//     // $VROFICINA = $_SESSION['vroficina'];
//     $respuesta = c_almacen::c_usuario();
//     echo $respuesta;
// }





class c_almacen
{

    static function    c_buscar_empleado($bd, $codPersonal, $searchinicio, $searchfin)
    {
        try {

            if (!empty($searchinicio) && !empty($searchfin)) {

                $mostrar = new m_almacen($bd);
                $datos = $mostrar->BuscarListaEmpleado($codPersonal, $searchinicio, $searchfin);

                // if (!$datos) {
                //     throw new Exception("Hubo un error en la consulta");
                // }

                $json = array();
                foreach ($datos as $row) {
                    $json[] = array(
                        "FECHA" => convFecSistema($row->FECHA),
                        "COD_PERSONAL" => $row->COD_PERSONAL,
                        "NOM_PERSONAL1" => $row->NOM_PERSONAL1,
                        "HORA_INGRESO" => $row->HORA_INGRESO,
                        "HORA_SALIDA" => $row->HORA_SALIDA,
                        "ING_PROGRAMADO" => $row->ING_PROGRAMADO,
                        "SAL_PROGRAMADO" => $row->SAL_PROGRAMADO,

                    );
                }
                // if ($json) {
                //     echo "ok";
                // } else {
                //     echo "error";
                // }
                $jsonstring = json_encode($json);
                echo $jsonstring;
            } else {


                $mostrar = new m_almacen($bd);
                $datos = $mostrar->MostrarListadosEmpleados($codPersonal);

                $json = array();
                foreach ($datos as $row) {
                    $json[] = array(
                        "FECHA" => convFecSistema($row->FECHA),
                        "COD_PERSONAL" => $row->COD_PERSONAL,
                        "NOM_PERSONAL1" => $row->NOM_PERSONAL1,
                        "HORA_INGRESO" => $row->HORA_INGRESO,
                        "HORA_SALIDA" => $row->HORA_SALIDA,
                        "ING_PROGRAMADO" => $row->ING_PROGRAMADO,
                        "SAL_PROGRAMADO" => $row->SAL_PROGRAMADO,

                    );
                }
                $jsonstring = json_encode($json);
                echo $jsonstring;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // static function c_usuario()
    // {
    //     try {
    //         $bd  = $_POST['empleadosLista'];
    //         // $oficina  = $_POST['oficina'];
    //         // $bd = 'empleadosLista';
    //         $mostrar = new m_almacen($bd);
    //         // echo $mostrar;
    //         $datos = $mostrar->usuario();


    //         $jsonstring = json_encode($datos);
    //         echo $jsonstring;
    //     } catch (Exception $e) {
    //         echo "Error: " . $e->getMessage();
    //     }
    // }
}
