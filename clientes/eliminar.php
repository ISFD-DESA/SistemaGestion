<?php
include '../config/conexion.php';   
//aca recibir id  y eliminar el registro
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$dni = $_POST['dni'];
$sexo = $_POST['sexo'];
$domicilio = $_POST['domicilio'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$datos_importantes = $_POST['datos_importantes'];

$sql = "DELETE * FROM usuarios WHERE id_cliente = '$id_cliente'";

if(isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])) {
    $id = $_GET['id_cliente'];

    if ($scon->query($sql) === TRUE) {
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . $scon->error;
    }
} else {
    echo "No se ha proporcionado un ID para eliminar.";
}


$scon->close();
?>
