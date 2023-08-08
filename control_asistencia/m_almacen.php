<?php

// require_once("../funciones/DataBaseA.php");
require_once("../funciones/DataDinamicaA.php");


class m_almacen
{

  private $bd_dinamica;
  public function __construct($bd_dinamica)
  {
    $this->bd_dinamica = $bd_dinamica;

    $this->bd_dinamica = DatabaseDinamica::Conectarbd($this->bd_dinamica);
  }



  public function BuscarListaEmpleado($codPersonal, $searchinicio, $searchfin)
  {
    try {
      $stm = $this->bd_dinamica->prepare("SELECT A.FECHA AS FECHA, A.COD_PERSONAL AS COD_PERSONAL, P.NOM_PERSONAL1 AS NOM_PERSONAL1,
                                 A.HORA_INGRESO AS HORA_INGRESO, A.HORA_SALIDA AS HORA_SALIDA, A.ING_PROGRAMADO AS ING_PROGRAMADO,
                                 A.SAL_PROGRAMADO AS SAL_PROGRAMADO
                                 FROM T_ASISTENCIAS AS A INNER JOIN T_PERSONAL P ON A.COD_PERSONAL=P.COD_PERSONAL 
                                 WHERE CAST(FECHA AS DATE) >='$searchinicio' AND  CAST(FECHA AS DATE) <='$searchfin' AND A.COD_PERSONAL='$codPersonal'");
      $stm->execute();
      $datos = $stm->fetchAll(PDO::FETCH_OBJ);

      return $datos;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  public function MostrarListadosEmpleados($codPersonal)
  {
    try {

      $stm = $this->bd_dinamica->prepare("SELECT A.CODIGO AS CODIGO, A.FECHA AS FECHA, A.COD_PERSONAL AS COD_PERSONAL, P.NOM_PERSONAL1 AS NOM_PERSONAL1,
                                 A.HORA_INGRESO AS HORA_INGRESO, A.HORA_SALIDA AS HORA_SALIDA, A.ING_PROGRAMADO AS ING_PROGRAMADO,
                                 A.SAL_PROGRAMADO AS SAL_PROGRAMADO
                                 FROM T_ASISTENCIAS AS A INNER JOIN T_PERSONAL P ON A.COD_PERSONAL=P.COD_PERSONAL
                                WHERE 
                                CAST(FECHA AS DATE) = CAST(GETDATE() AS DATE)
                                AND A.COD_PERSONAL='$codPersonal'");

      $stm->execute();
      $datos = $stm->fetchAll(PDO::FETCH_OBJ);

      return $datos;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }
  // public function usuario()
  // {
  //   try {

  //     $stm = $this->bd_dinamica->prepare("SELECT * FROM T_USUARIO WHERE PAS_USUARIO = ' '");

  //     $stm->execute();
  //     $datos = $stm->fetchAll(PDO::FETCH_ASSOC);

  //     return $datos;
  //   } catch (Exception $e) {
  //     die($e->getMessage());
  //   }
  // }
}
