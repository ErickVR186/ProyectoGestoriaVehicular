<?php 

$cliente=$_POST['nombre'];
$carpetaDestino="../Documentos/$cliente/";
$mensa = "";

//Identificación Oficial

if(isset($_FILES['idOficial']) && $_FILES['idOficial']['name']){
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
        }else{
            $valores= 2;
            $mensa = "No se ha podido crear la carpeta: ".$carpetaDestino;
        }
    }else{
        $valores= 2;
        $mensa = $_FILES["idOficial"]["name"]." - No es un documento PDF";
    }
}

//Tarjeta de Circulación Vigente

if(isset($_FILES['tarCirculacion']) && $_FILES['tarCirculacion']['name']){
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
                $valores=1;
            }else{
                $valores=0;
            }
        }else{
            $valores= 2;
            $mensa = "No se ha podido crear la carpeta: ".$carpetaDestino;
        }
    }else{
        $valores= 2;
        $mensa = $_FILES["tarCirculacion"]["name"]." - No es un documento PDF";
    }
}

//Acreditación Juridica
if(isset($_FILES['AcredJuri']) && $_FILES['AcredJuri']['name']){
    # si es un formato de imagen
    if($_FILES["AcredJuri"]["type"]=="application/pdf")
    {
       # si exsite la carpeta o se ha creado
        if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
        {
            $origen=$_FILES["AcredJuri"]["tmp_name"];
            $destino=$carpetaDestino.$_FILES["AcredJuri"]["name"];

            # movemos el archivo
            if(@move_uploaded_file($origen, $destino))
            {   
                $valores=1;
            }else{
                $valores=0;
            }
        }else{
            $valores= 2;
            $mensa = "No se ha podido crear la carpeta: ".$carpetaDestino;
        }
    }else{
        $valores= 2;
        $mensa = $_FILES["AcredJuri"]["name"]." - No es un documento PDF";
    }
}

//Comprobante de Domicilio
if(isset($_FILES['comprDomi']) && $_FILES['comprDomi']['name']){
    # si es un formato de imagen
    if($_FILES["comprDomi"]["type"]=="application/pdf")
    {
       # si exsite la carpeta o se ha creado
        if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
        {
            $origen=$_FILES["comprDomi"]["tmp_name"];
            $destino=$carpetaDestino.$_FILES["comprDomi"]["name"];

            # movemos el archivo
            if(@move_uploaded_file($origen, $destino))
            {   
                $valores=1;
            }else{
                $valores=0;
            }
        }else{
            $valores= 2;
            $mensa = "No se ha podido crear la carpeta: ".$carpetaDestino;
        }
    }else{
        $valores= 2;
        $mensa = $_FILES["comprDomi"]["name"]." - No es un documento PDF";
    }
}

//Comprobante de Propiedad
if(isset($_FILES['comprProp']) && $_FILES['comprProp']['name']){
    # si es un formato de imagen
    if($_FILES["comprProp"]["type"]=="application/pdf")
    {
       # si exsite la carpeta o se ha creado
        if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
        {
            $origen=$_FILES["comprProp"]["tmp_name"];
            $destino=$carpetaDestino.$_FILES["comprProp"]["name"];

            # movemos el archivo
            if(@move_uploaded_file($origen, $destino))
            {   
                $valores=1;
            }else{
                $valores=0;
            }
        }else{
            $valores= 2;
            $mensa = "No se ha podido crear la carpeta: ".$carpetaDestino;
        }
    }else{
        $valores= 2;
        $mensa = $_FILES["comprProp"]["name"]." - No es un documento PDF";
    }
}

//Comprobante de Pago de Tenencia
if(isset($_FILES['CompPagoT']) && $_FILES['CompPagoT']['name']){
    # si es un formato de imagen
    if($_FILES["CompPagoT"]["type"]=="application/pdf")
    {
       # si exsite la carpeta o se ha creado
        if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
        {
            $origen=$_FILES["CompPagoT"]["tmp_name"];
            $destino=$carpetaDestino.$_FILES["CompPagoT"]["name"];

            # movemos el archivo
            if(@move_uploaded_file($origen, $destino))
            {   
                $valores=1;
            }else{
                $valores=0;
            }
        }else{
            $valores= 2;
            $mensa = "No se ha podido crear la carpeta: ".$carpetaDestino;
        }
    }else{
        $valores= 2;
        $mensa = $_FILES["CompPagoT"]["name"]." - No es un documento PDF";
    }
}

//Factura del vehiculo
if(isset($_FILES['FacVehi']) && $_FILES['FacVehi']['name']){
    # si es un formato de imagen
    if($_FILES["FacVehi"]["type"]=="application/pdf")
    {
       # si exsite la carpeta o se ha creado
        if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
        {
            $origen=$_FILES["FacVehi"]["tmp_name"];
            $destino=$carpetaDestino.$_FILES["FacVehi"]["name"];

            # movemos el archivo
            if(@move_uploaded_file($origen, $destino))
            {   
                $valores=1;
            }else{
                $valores=0;
            }
        }else{
            $valores= 2;
            $mensa = "No se ha podido crear la carpeta: ".$carpetaDestino;
        }
    }else{
        $valores= 2;
        $mensa = $_FILES["FacVehi"]["name"]." - No es un documento PDF";
    }
}

//CURP
if(isset($_FILES['curp']) && $_FILES['curp']['name']){
    # si es un formato de imagen
    if($_FILES["curp"]["type"]=="application/pdf")
    {
       # si exsite la carpeta o se ha creado
        if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
        {
            $origen=$_FILES["curp"]["tmp_name"];
            $destino=$carpetaDestino.$_FILES["curp"]["name"];

            # movemos el archivo
            if(@move_uploaded_file($origen, $destino))
            {   
                $valores=1;
            }else{
                $valores=0;
            }
        }else{
            $valores= 2;
            $mensa = "No se ha podido crear la carpeta: ".$carpetaDestino;
        }
    }else{
        $valores= 2;
        $mensa = $_FILES["curp"]["name"]." - No es un documento PDF";
    }
}

//Acta de Nacimiento
if(isset($_FILES['ActNaci']) && $_FILES['ActNaci']['name']){
    # si es un formato de imagen
    if($_FILES["ActNaci"]["type"]=="application/pdf")
    {
       # si exsite la carpeta o se ha creado
        if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
        {
            $origen=$_FILES["ActNaci"]["tmp_name"];
            $destino=$carpetaDestino.$_FILES["ActNaci"]["name"];

            # movemos el archivo
            if(@move_uploaded_file($origen, $destino))
            {   
                $valores=1;
            }else{
                $valores=0;
            }
        }else{
            $valores= 2;
            $mensa = "No se ha podido crear la carpeta: ".$carpetaDestino;
        }
    }else{
        $valores= 2;
        $mensa = $_FILES["ActNaci"]["name"]." - No es un documento PDF";
    }
}

$variables = [$valores, $mensa];
echo json_encode($variables);

?>