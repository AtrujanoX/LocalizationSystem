<?php
//include( 'session.php' );
include( 'config.php' );
if ( !isset( $_SESSION ) ) {
	session_start();
}


if ( !isset( $_SESSION[ 'login_user' ] ) ) {
	require( 'login.php' );
	return ( 0 );
} else {
	$user_check = $_SESSION[ 'login_user' ];
	$ses_sql = mysqli_query( $db, "select user from usuarios where user = '$user_check' " );
	$row = mysqli_fetch_array( $ses_sql, MYSQLI_ASSOC );
	$login_session = $row[ 'user' ];
}
?>

<html>


<head>
	<meta charset="utf-8">
	<title>Bienvenido</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</head>

<body>
	<h1>Bienvenido <?php echo $login_session; ?></h1>
	<h2><a href = "logout.php">Sign Out</a></h2>
	<h2><a href = "subirTSV.php">Subir TSV</a></h2>
	<h2><a href = "verArchivos.php">Ver Traducciones</a></h2>
</body>

</html>