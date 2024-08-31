<?php

include 'conexion_be.php';

$nombre_completo = $_POST['nombre_completo'];
$correo = $_POST['correo'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

//ENCRIPTADO DE CONTRASEÑA
$contrasena = hash('sha512', $contrasena);
$dni = $_POST['dni'];


$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena, dni) 
          VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena', '$dni')";

//VERIFICAR QUE EL CORREO NO SE REPITA EN LA BASE
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo' ");

if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
    <script>
    alert("Este correo ya esta registrado");
    window.location = "../index.php";
    </script>
    ';
    exit();
}


//VERIFICAR QUE EL DNI NO SE REPITA EN LA BASE
$verificar_dni = mysqli_query($conexion, "SELECT * FROM usuarios WHERE dni = '$dni' ");

if (mysqli_num_rows($verificar_dni) > 0) {
    echo '
    <script>
    alert("Este Numero de DNI ya esta registrado");
    window.location = "../index.php";
    </script>
    ';
    exit();
}


//VERIFICAR QUE EL NOMBRE DE USUARIO NO SE REPITA EN LA BASE
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' ");

if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '
    <script>
    alert("Este usuario ya esta registrado");
    window.location = "../index.php";
    </script>
    ';
    exit();
}

    $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
           <script>
           alert("Usuario alamacenado exitosamente");
           window.location = "../index.php";
           </script>
        ';
} else {
    echo '
    <script>
    alert("Intentanlo denuvo, usuario no alamacenado :(");
    window.location = "../index.php";
    </script>
 ';
}

mysqli_close($conexion);
?>