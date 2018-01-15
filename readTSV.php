<?php
include( 'session.php' );
//include( 'config.php' );
?>


<?php

$existentes = $nuevas = 0;
$filename = $_FILES[ 'file' ][ 'tmp_name' ];
$nombreArchivo = $_FILES[ 'file' ][ 'name' ];
$proyecto = $_POST['proyecto'];
$usuario = $_SESSION['login_user'];
$fd = fopen( $filename, "r" );
$contents = fread( $fd, filesize( $filename ) );

fclose( $fd );
$lineas = explode( "\n", $contents );
$counter = 0;
$existentes = 0;
$nuevas = 0;
?>

<html><head>
	<meta charset="utf-8">
	<title>Documento sin título</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>
<body>
<table class="table-striped">
	<?php
	foreach ( $lineas as $row ) {

		$counter++;
		
		echo "<tr>";
		$celdas = explode( "\t", $row );
		echo "<td>".$celdas[0]."</td>";
		echo "<td>".$celdas[1]."</td>";
		echo "</tr>";
		
		//consultar si ya ex iste
		$consulta = "SELECT * FROM tablacambios WHERE direccion = '$celdas[0]'";
		$respuesta = mysqli_query($db,$consulta) or die(mysqli_error($db));
		if(mysqli_num_rows($respuesta) > 0){
			$existentes++;
		} else {
			$celdas[1] = mysqli_real_escape_string($db, $celdas[1]);
			$insercion = "INSERT INTO tablacambios (proyecto, archivo, direccion, original, modifica) VALUES ('$proyecto','$nombreArchivo','$celdas[0]','$celdas[1]','$usuario')";
			mysqli_query($db,$insercion)or die(mysqli_error($db));
			$nuevas++;
		}
	}

	?>
</table>
<?php echo "existentes: ".$existentes.". nuevas: ".$nuevas; ?>
</body>
</html>