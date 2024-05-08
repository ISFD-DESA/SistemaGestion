<?php
include '../config/conexion.php';   

// Verificamos si se ha enviado un ID válido por GET
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminamos el producto de la base de datos
    $sql = "DELETE FROM clientes WHERE id_cliente = $id";

    if (mysqli_query($scon, $sql)) {
        echo "<script>alert('Cliente eliminado exitosamente'); window.location='clientes.php';</script>";
        exit(); // Asegura que no se ejecute más código después de la redirección
    } else {
        echo "Error al eliminar el cliente: " . mysqli_error($scon);
    }
} else {
    echo "ID no válido.";
}

mysqli_close($scon);
?>
