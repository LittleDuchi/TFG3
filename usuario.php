<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$conexion = new mysqli("localhost", "usuario", "Melones2023.", "tfg");


// Formulario de registro


$nombre = $_POST['nombre'];
$apellido1 = $_POST['apellido1'];   
$apellido2 = $_POST['apellido2'];
$email = $_POST['email'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

$stmt = $conexion->prepare("INSERT INTO user (nombre, apellido1, apellido2, email, contrasena) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nombre, $apellido1, $apellido2, $email, $contrasena);

if ($stmt->execute()) {
    echo "Usuario registrado exitosamente.";
} else {
    echo "Error al registrar el usuario: " . $stmt->error;
}

$stmt->close();
$conexion->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <h2>Registro de Usuario</h2>
          <form action="" method="POST">
            <label for="nombre">Nombre:</label>
         <input type="text" name="nombre" id="nombre" required>

          <label for="apellido1">Primer Apellido:</label>
         <input type="text" name="apellido1" id="apellido1">

          <label for="apellido2">Segundo Apellido:</label>
         <input type="text" name="apellido2" id="apellido2">

         <label for="email">Correo Electrónico:</label>
          <input type="email" name="email" id="email" required>

         <label for="contrasena">Contraseña:</label>
         <input type="password" name="contrasena" id="contrasena" minlength="8" required>

        <button type="submit">Registrarse</button>
         </form>

</body>
</html>
