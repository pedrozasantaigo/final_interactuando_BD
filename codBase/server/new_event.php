<?php
    
session_start();
$titulo = $_POST['titulo'];
$finicio = $_POST['start_date'];
$hinicio = $_POST['start_hour'];
$ffin = $_POST['end_date'];
$hfin = $_POST['end_hour'];
$dia_completo = $_POST['allDay'];

$respuesta = [];
$respuesta['msg'] = [];

$conn = mysqli_connect("localhost", 'TMEXPRESS', 'MARY', 'next_u');

$sql = "insert into eventos (title,start, hora_inicio, end, hora_finalizacion, allDay, usuario)"
        . " value ('$titulo','$finicio','$hinicio','$ffin','$hfin','$dia_completo','".$_SESSION['user']."')";

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
