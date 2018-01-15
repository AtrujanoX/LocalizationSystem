<?php
include( 'session.php' );

if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {

	$archivo = $_POST[ 'archivo' ];

	$sql = "SELECT * FROM tablacambios WHERE archivo = '$archivo'";
	$result = mysqli_query( $db, $sql )or die( mysqli_error( $db ) );
	$rows  = array();
	while ( $row = mysqli_fetch_array( $result ) )
		$rows[] = $row;

} else {

	$sql = "SELECT archivo FROM tablacambios GROUP BY archivo";
	$result = mysqli_query( $db, $sql )or die( mysqli_error( $db ) );
	$rows = array();
	while ( $archivoLista = mysqli_fetch_array( $result ) )
		$rows[] = $archivoLista;

}


?>

<html>

<head>
	<meta charset="utf-8">
	<title>Ver TSV</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>

<body>

	<?php
	if ( $_SERVER[ "REQUEST_METHOD" ] != "POST" ) {
		echo '
	<form action="" method="post" class="form-horizontal">
		<fieldset>
			<legend>Ver archivo TSV</legend>

			<!-- Selector Proyectos -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="proyecto">Selecciona Archivo</label>
				<div class="col-md-4">
					<select id="archivo" name="archivo" class="form-control">
						<option value="0">-</option>
						';
		foreach ( $rows as $row ) {
			echo "<option value='" . $row[ 'archivo' ] . "'>" . $row[ 'archivo' ] . "</option>";
		}
		echo '
					</select>
				</div>
			</div>
			<!-- Boton Submit -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="subir"></label>
				<div class="col-md-4">
					<button id="subir" name="subir" class="btn btn-primary">Subir</button>
				</div>
			</div>
		</fieldset>
	</form>';


	} else {
?>
		<table class="table-striped">
		<tr>
		<th>Etiqueta</th>
		<th>Original</th>
		<th>Traduccion</th>
		</tr>
		<?PHP
		foreach ( $rows as $row ) {

			$counter++;
			
			echo "<tr>";
			//$row = explode( "\t", $row );
			echo "<td>" . $row[ 'direccion' ] . "</td>";
			echo "<td>" . $row[ 'original' ] . "</td>";
			echo "<td>" . $row[ 'traduccion' ] . "</td>";
			echo "</tr>";

		}



	}
	?>
	</table>
</body>

</html>