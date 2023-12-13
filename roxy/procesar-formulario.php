<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Validación básica (puedes agregar más validaciones según tus necesidades)
    if (empty($name) || empty($email)) {
        echo "Por favor, complete todos los campos.";
    } else {
        // Conexión a la base de datos (reemplaza con tus propias credenciales)
        $conexion = new mysqli("nombre_del_servidor", "nombre_de_usuario", "contraseña", "nombre_de_tu_base_de_datos");

        // Verifica la conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Prepara la consulta SQL para insertar datos en la tabla "usuarios"
        $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$name', '$email')";

        // Ejecuta la consulta
        if ($conexion->query($sql) === TRUE) {
            echo "¡Gracias por suscribirte!";
        } else {
            echo "Error al guardar los datos: " . $conexion->error;
        }

        // Cierra la conexión
        $conexion->close();
    }
} else {
    // Si alguien intenta acceder directamente a este script, redirige a la página del formulario
    header("Location: formulario.html");
    exit();
}
?>
