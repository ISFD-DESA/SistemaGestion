<?php
include '../config/conexion.php'; 

// Verificamos si se ha enviado un formulario por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperamos los datos del formulario
    $id = $_POST['id'];
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $dni = $_POST['dni'];
    $sexo = $_POST['sexo'];
    $domicilio = $_POST['domicilio'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $datos_importantes = $_POST['datos'];

    // Actualizamos los datos en la base de datos
    $sql = "UPDATE clientes SET apellido='$apellido', nombre='$nombre', dni=$dni,
     sexo='$sexo', domicilio='$domicilio', telefono='$telefono', correo='$correo', datos_importantes='$datos_importantes'
    WHERE id_cliente=$id";

    if (mysqli_query($scon, $sql)) {
        echo "Registro actualizado exitosamente";
        // Redireccionamos a index.php después de mostrar el mensaje
        header("Location: clientes.php");
        exit(); // Asegura que no se ejecute más código después de la redirección
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($scon);
    }
}

mysqli_close($scon);
?>
