<?PHP
//include( "config.php" );
if ( !isset( $_SESSION ) ) {
	session_start();
}
if ( $_SERVER[ "REQUEST_METHOD" ] == "POST" ) {

	$myusername = mysqli_real_escape_string( $db, $_POST[ 'user' ] );
	$mypassword = mysqli_real_escape_string( $db, $_POST[ 'pass' ] );

	$sql = "SELECT user FROM usuarios WHERE user = '$myusername' and pass = '$mypassword'";
	$result = mysqli_query( $db, $sql )or die( mysqli_error() );;
	$row = mysqli_fetch_array( $result, MYSQLI_ASSOC )or die( mysqli_error() );;

	$count = mysqli_num_rows( $result );

	// If result matched $myusername and $mypassword, table row must be 1 row

	if ( $count == 1 ) {

		$_SESSION[ 'login_user' ] = $myusername;

		header( "Location: ./" );
	} else {
		$error = "Your Login Name or Password is invalid";
	}
}
?>
<!--
<html>


<head>
	<meta charset="utf-8">
	<title>Inicia Sesion</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

</head>

<body>
	<form action="" method="post" class="form-horizontal">
		<fieldset>

			<legend>Login</legend>
			<div class="form-group">
				<label class="col-md-4 control-label" for="user">Usuario</label>
				<div class="col-md-4">
					<input id="user" name="user" type="text" placeholder="" class="form-control input-md" required="">

				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="pass">Contraseña</label>
				<div class="col-md-4">
					<input id="pass" name="pass" type="password" placeholder="" class="form-control input-md" required="">

				</div>
			</div>
			<div class="form-group">
				<label class="col-md-4 control-label" for="login"></label>
				<div class="col-md-4">
					<button type="submit" id="login" name="login" class="btn btn-primary">Login</button>
				</div>
			</div>

		</fieldset>
	</form>
</body>

</html>


-->

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css"> </head>

<body>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-white p-5 bg-primary">
            <div class="card-body">
              <h1 class="mb-4">Iniciar Sesión</h1>
              <form action="" method="post" class="form-horizontal">
                <div class="form-group"> <label>Usuario</label>
                  <input type="text" class="form-control" name="user"> </div>
                <div class="form-group"> <label>Contraseña</label>
                  <input type="password" class="form-control" name="pass"> </div>
                <button type="submit" class="btn btn-secondary">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>



