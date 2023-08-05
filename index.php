<?php
require_once '../LISTADOEMPLEADO/funciones/DataDinamicaA.php';
$bd = 'empleadosLista';
if (isset($_POST['insert'])) {

    $conn = new DatabaseDinamica();
    $conectar = $conn->Conectarbd($bd);

    // Obtener los datos del formulario
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Verificar las credenciales en la base de datos
    // $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
    // $result = $conn->query($query);

    $stm = $conectar->prepare("SELECT * FROM T_USUARIO WHERE USU_USUARIO=:USUARIO AND PAS_USUARIO = :CLAVE;");
    $stm->bindParam(':USUARIO', $usuario);
    $stm->bindParam(':CLAVE',  $clave);
    $stm->execute();
    $datos = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $datos;
    if ($datos) {
        echo '<h1>Si</h1>';
    } else {
        echo "no hay";
    }



    // Cerrar la conexión a la base de datos
    // $stm->close();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login con sesion</title>
</head>

<body>
    <form method="POST">
        <br>
        <input type="text" name="usuario" placeholder="Digite usuario">
        <br>
        <br>
        <input type="password" name="clave" placeholder="digite contraseña">
        <br>
        <br>
        <input type="submit" value="Entrar" class="btn" name="insert"> <br>
    </form>
</body>

</html>