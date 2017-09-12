<?php
session_start();
$usuario = $_POST['username'];
$contrasena = $_POST['password'];
$respuesta = [];
$respuesta['msg'] = [];
$sql = "select * from usuarios where correo = '$usuario' limit 1";
$conn = mysqli_connect("localhost", 'TMEXPRESS', 'MARY', 'next_u');

if(!$conn){
    array_push($respuesta['msg'], "Error conectando a la Base de datos: ". mysqli_error($conn));
    die(print_r(json_encode($respuesta)));
};

$result = mysqli_query($conn, $sql);

if(!$result){
    array_push($respuesta['msg'], "Error al conectar con el servidor ". mysqli_error($conn));
    die(print_r(json_encode($respuesta))); 
};

$arreglo = [];

$arreglo = mysqli_fetch_all($result,MYSQLI_ASSOC);
 
if (password_verify($contrasena, $arreglo[0]['contrasena'])) {
    array_push($respuesta['msg'], "OK");
    $_SESSION['user'] = $usuario;
} else {
     array_push($respuesta['msg'], "Contrasena incorrecta.");
};


print_r(json_encode($respuesta));
mysqli_close($conn);
 ?>
