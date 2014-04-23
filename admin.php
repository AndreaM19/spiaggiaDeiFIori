<?php
require_once 'include/Events/Event.php';
require_once 'include/File_management/FileManager.php';
require_once 'include/Auth/user.php';
require_once 'include/Auth/LoginSessions.php';
?>

<?php
LoginSessions::startSession();
?>

<?php 
if(isset($_GET['login'])){
	$fileName="resources/log.txt";
	$inLogInfo=null;
	$gettedLogInfo=null;
	$fm=new FileManager();
	if($_GET['login']=="pre"){
		$inLogInfo=new User(md5($_POST['username']), md5($_POST['password']));
		$gettedLogInfo=$fm->getFile($fileName);
		if($inLogInfo->getUsername()==md5("19andrea.m@gmail.com") && $inLogInfo->getPassword()==md5("andrea")){
			$_SESSION['user']=$inLogInfo->getName();
			$_SESSION['level']=$inLogInfo->getLevel();
			header("location:admin.php?login=ok");
		}
		else header("location:admin.php?login=fail");
	}
	else if(@$_GET['login']=="stop"){
		LoginSessions::stopSession("index.php");
	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="../../assets/ico/favicon.ico">

<title>Spiaggia dei fiori Fano</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

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
						<h3 class="masthead-brand mainTitle">Spiaggia dei fiori - Fano</h3>
						<ul class="nav masthead-nav">
							<li class="active"><a href="index.php">Home</a></li>
							<li><a href="spiaggia.php">Spiaggia e Servizi</a></li>
							<li><a href="contatti.php">Contatti e Location</a></li>
						</ul>
					</div>
				</div>
				<div class="mainDisplayer">
					<h1 class="cover-heading">Area riservata</h1>
					<hr>
					<?php 
					if(!isset($_GET['login']) | @$_GET['login']=="fail"){
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

					else if($_GET['login']=="ok" && @$_SESSION['level']==1){
						echo"<h4>Welcome ".$_SESSION['user']."</h4>";
						
						echo"<div class='col-md-3'>";
						echo"<a href='#' class='btn btn-lg btn-default'>Aggiungi un evento</a>";
						echo"</div>";
						echo"<div class='col-md-3'>";
						echo"<a href='#' class='btn btn-lg btn-default'>Modifica un evento</a>";
						echo"</div>";
						echo"<div class='col-md-3'>";
						echo"<a href='#' class='btn btn-lg btn-default'>Rimuovi un evento</a>";
						echo"</div>";
						echo"<div class='col-md-3'>";
						echo"<a href='admin.php?login=stop' class='btn btn-lg btn-warning'>Logout</a>";
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
		</p>
	</div>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
