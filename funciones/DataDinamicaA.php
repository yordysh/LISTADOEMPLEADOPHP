<?php
class DatabaseDinamica
{
    // public $bd = 'empleadosLista';
    public static  function Conectarbd($bd)
    {
        try {
            $base_de_datos = new PDO("sqlsrv:server=DESKTOP-C8GLM7A;database=" . $bd, "sa", "123");
            $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $base_de_datos;
        } catch (Exception $e) {
            echo "Ocurrió un error con la base de datos: " . $e->getMessage();
        }
    }
}
