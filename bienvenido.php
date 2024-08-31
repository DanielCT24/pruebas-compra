
<?php
session_start();

if(!isset($_SESSION['usuario'])) {
    echo '
    <script>
    alert("Debes iniciar sesión para continuar con el CheckOut");
    window.location = "index.php";
    </script>>
    ';
    header("location: index.php");
    session_destroy();
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido estimado</title>
</head>
<body>
    
<h1>Eres mio</h1>
<a href ="php/cerrar_sesion.php">cerrar sesion</a> <!-- CODIGO DEMASIADO IMPORTANTE -->

</body>
</html>