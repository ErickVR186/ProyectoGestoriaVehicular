<?php
$cliente=$_POST['nombre'];
$carpetaDestino="Documentos/$cliente/";
//echo $carpetaDestino;
session_start();

if(isset($_FILES['idOficial']) && $_FILES['idOficial']['name'])
   {
            # si es un formato de imagen
            if($_FILES["idOficial"]["type"]=="application/pdf")
            {
               # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["idOficial"]["tmp_name"];
                    $destino=$carpetaDestino.$_FILES["idOficial"]["name"];
 
                    # movemos el archivo
                    if(@move_uploaded_file($origen, $destino))
                    {   
                        $valores=1;
                    }else{
                        $valores=0;
                    }
                    $_SESSION['valores'] = $valores;
                }else{
                    echo "<br>No se ha podido crear la carpeta: ".$carpetaDestino;
                }
            }else{
                echo "<br>".$_FILES["idOficial"]["name"]." - No es un documento PDF";
            }
        }
if(isset($_FILES['tarCirculacion']) && $_FILES['tarCirculacion']['name'])
   {
            # si es un formato de imagen
            if($_FILES["tarCirculacion"]["type"]=="application/pdf")
            {
               # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["tarCirculacion"]["tmp_name"];
                    $destino=$carpetaDestino.$_FILES["tarCirculacion"]["name"];
 
                    # movemos el archivo
                    if(@move_uploaded_file($origen, $destino)) 
                    {
                        $valores1=1;
                    }else{
                        $valores1=0;                        
                    }
                    $_SESSION['valores1'] = $valores1;
                }else{
                    echo "<br>No se ha podido crear la carpeta: ".$carpetaDestino;
                }
            }else{
                echo "<br>".$_FILES["tarCirculacion"]["name"]." - No es un documento PDF";
            }
    }


if((!isset($_FILES['idOficial']) && $_FILES['idOficial']['name']) && (!isset($_FILES['tarCirculacion']) && $_FILES['tarCirculacion']['name'])){
        $valores2=1; 
        $_SESSION['valores2'] = $valores2;
}
header("Location: reposicionOnline.php");

?>