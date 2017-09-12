<?php
$conn = mysqli_connect("localhost", 'TMEXPRESS', 'MARY', 'next_u');

$respuesta = [];
$respuesta['msg'] = [];

$sql = "insert into usuarios (usuario,contrasena,correo,fecha_nacimiento)"
        . " value('Santiago Pedroza','".  password_hash('prueba', PASSWORD_DEFAULT)."','santyaristi@gmail.com','18/04/1990')";

if(!$conn){
    array_push($respuesta['msg'], "Error conectando a la Base de datos: ". mysqli_error($conn));
    die(print_r(json_encode($respuesta)));
};

$result = mysqli_query($conn, $sql);


if(!$result){
    array_push($respuesta['msg'], "Error al conectar con el servidor ". mysqli_error($conn));
    die(print_r(json_encode($respuesta))); 
};
 
print_r(json_encode($respuesta));
mysqli_close($conn);


 ?>
