<?php
include( 'session.php' );


$sql = "SELECT * FROM proyectos";
$result = mysqli_query( $db, $sql )or die( mysqli_error($db) );
$rows = array();
while ( $row = mysqli_fetch_array( $result ) )
	$rows[] = $row;
?>



<html>

<head>
	<meta charset="utf-8">
	<title>Documento sin título</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</head>

<body>


	<form action='readTSV.php' method="post" enctype="multipart/form-data" class="form-horizontal">
		<fieldset>
			<legend>Subir archivo TSV</legend>

			<!-- Selector Proyectos -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="proyecto">Selecciona Proyecto</label>
				<div class="col-md-4">
					<select id="proyecto" name="proyecto" class="form-control">
						<option value='0'>-</option>
						<?php
						foreach ( $rows as $row ) {
							echo "<option value='".$row['nombre']."'>".$row['nombre']."</option>";
						}
						?>
					</select>
				</div>
			</div>

			<!-- Archivo -->
			<div class="form-group">
				<label class="col-md-4 control-label" for="filebutton">Seleccionar TSV</label>
				<div class="col-md-4">
					<input id="file" name="file" class="input-file" type="file">
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
	</form>


</body>

</html>