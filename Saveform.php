<?php
session_start();  
// Include config file
require_once "config.php";
$nombre = $_POST['Status'];
echo$nombre;
if(isset($_POST["Status"]) & isset($_POST["userScore"])){
$userScore= $_POST["userScore"]; 
$status=$_POST["Status"]; 


    
    $query = " Insert into Evaluacion_Usuario (Id_Evaluacion, ID_Usuario, Id_Entrenador, Puntuacion, comentario, Estatus) values (3,".$_SESSION['id_usuario'].",".$_SESSION['Id_Entrenador'].", $userScore, 'Test',$status) ";


    mysqli_query($link, $query);  
    mysqli_close($link);


}
?>