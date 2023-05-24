<?php 
$nombre = $_GET['user'];
$tramite = $_GET['tram'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tickets</title>
	<style type="text/css">
		body{
			background-color: #313538;
		}
		#pdf{
			width:100%; 
			height: 96vh;
		}
		@media screen and (max-width: 404px){
			#pdf{
				height: 90vh;
			}
		}
	</style>
</head>
<body>
    <embed id="pdf" src="Documentos/<?php echo $nombre; ?>/<?php echo $tramite; ?>" type="application/pdf" />
</body>
</html>
