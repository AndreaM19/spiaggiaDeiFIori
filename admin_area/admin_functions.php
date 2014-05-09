<?php
require_once '../include/Events/Event.php';
require_once '../include/File_management/FileManager.php';
require_once '../include/Auth/user.php';
require_once '../include/Auth/LoginSessions.php';
?>

<?php
LoginSessions::startSession();
?>

<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../../assets/ico/favicon.ico">

<title>Spiaggia dei fiori Fano</title>

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="../css/style.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<div id="container">
		<div class="col-md-2"></div>

		<div class="col-md-8">
			<div class="mainContent">
				<div class="clearfix">
					<div class="inner">
						<img src="../img/Logo.png"
							class="masthead-brand logoImage img-responsive">
						<!--<h3 class="masthead-brand mainTitle">Spiaggia dei fiori - Fano</h3> -->
						<ul class="nav masthead-nav">
							<li class="active"><a href="../index.php">Home</a></li>
							<li><a href="../spiaggia.php">Spiaggia e Servizi</a></li>
							<li><a href="../contatti.php">Contatti e Location</a></li>
						</ul>
					</div>
				</div>
				<div class="mainDisplayer">
					<h1 class="cover-heading">Area riservata</h1>
					<hr>
					<?php 
					if(!isset($_SESSION) || count($_SESSION)==0 || @$_GET['login']=="fail"){
						echo "<div style='max-width: 270px; margin: 0 auto;'>
						<form class='form-signin' role='form'
						action='admin.php?login=pre' method='post'>
						<br> <br> <input type='email' class='form-control'
						placeholder='Email address' required autofocus name='username'>
						<input type='password' class='form-control'
						placeholder='Password' required name='password'> <br>
						<button class='btn btn-default btn-block' type='submit'>Sign in</button>
						</form>
						</div>
						<br>";
						if(@$_GET['login']=="fail"){
							echo "<div class='alert alert-danger' style='width:200px;margin: 0 auto'>
							<button type='button' class='close' data-dismiss='alert'>&times;</button>
							Username e/o password errati
							</div>";
						}
					}

					else if(isset($_SESSION) && count($_SESSION)>0 && @$_SESSION['level']==1){
						echo"<div class='col-md-12t'>";
						echo"<p>";
						echo"<a href='admin.php'>".$_SESSION['user']."</a>";
						echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
						echo"<a href='admin.php?login=stop' >Logout</a>";
						echo"</p>";
						echo"</div>";

						echo"<hr>";
						echo"<div class='col-md-12 alignLeft'>";

						if(isset($_GET['action'])){
							$function=$_GET['action'];


							switch ($function) {
								case "addEvent":
									echo"<h3>Aggiungi Evento</h3>";
									break;
								case "editEvent":
									echo"<h3>Modifica Evento</h3>";
									break;
								case "deleteEvent":
									echo"<h3>Rimuovi Evento</h3>";
									break;
								case "newList":
									echo"<h3>Nuovo listino prezzi</h3>";
									break;
								default:
									echo"<h3>Comando sconosciuto</h3>";
									break;
							}
						}
						else echo"<h3>Comando sconosciuto</h3>";
						echo"</div>";
					}
					else{
						echo "<div class='alert alert-danger' style='width:200px;margin: 0 auto'>
						<button type='button' class='close' data-dismiss='alert'>&times;</button>
						Accesso non autorizzato
						</div>";
						echo"<br><a href='admin.php'>Torna alla pagina di accesso</a>";
					}

					?>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div id="push"></div>
	</div>
	<div id="footer">
		<p class="footerInfo">
			&copy; Design by <a href="http://about.me/andrea.marchetti/"
				target="_blanks">Andrea Marchetti</a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a
				href="http://jigsaw.w3.org/css-validator/check/referer"> CSS3
				Certified </a>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a
				href="#"> Mappa del sito</a>
		</p>
	</div>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="../js/jquery-1.11.0.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

</body>
</html>
