<?php
  
session_start();

$respuesta = [];
$respuesta['msg'] = [];
$respuesta['eventos'] = [];
$respuesta['sql'] = [];

$conn = mysqli_connect("localhost", 'TMEXPRESS', 'MARY', 'next_u');

$sql = "select * from eventos where usuario = '". $_SESSION['user']."'";
array_push($respuesta['sql'],$sql);
if(!$conn){
    array_push($respuesta['msg'], "Error conectando a la Base de datos: ". mysqli_error($conn));
    die(print_r(json_encode($respuesta)));
};

$result = mysqli_query($conn, $sql);



if(!$result){
    array_push($respuesta['msg'], "Error al conectar con el servidor ". mysqli_error($conn));
    die(print_r(json_encode($respuesta))); 
}else{
    $eventos = [];
//    $eventos = mysqli_fetch_all($result, MYSQLI_ASSOC);
     array_push($respuesta['msg'], "OK");
    while($row = mysqli_fetch_array($result)){
         array_push($respuesta['eventos'],$row);
    }  
};

print_r(json_encode($respuesta));
mysqli_close($conn);

 ?>
