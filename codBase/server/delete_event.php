<?php
    
session_start();

//print_r($_POST);
//die;
$id = $_POST['id']; 
 
 

$respuesta = [];
$respuesta['msg'] = [];
$respuesta['sql'] = [];

$conn = mysqli_connect("localhost", 'TMEXPRESS', 'MARY', 'next_u');

$sql = "DELETE FROM eventos where id = '$id'";
array_push($respuesta['sql'], $sql); 

if(!$conn){
    array_push($respuesta['msg'], "Error conectando a la Base de datos: ". mysqli_error($conn));
    die(print_r(json_encode($respuesta)));
};

$result = mysqli_query($conn, $sql);

  

if(!$result){
    array_push($respuesta['msg'], "Error al conectar con el servidor ". mysqli_error($conn));
    die(print_r(json_encode($respuesta))); 
}else{
      array_push($respuesta['msg'], "OK");
};

print_r(json_encode($respuesta));
mysqli_close($conn);

 ?>
