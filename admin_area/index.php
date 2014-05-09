<?php
require_once '../include/Events/Event.php';
require_once '../include/File_management/FileManager.php';
require_once '../include/Auth/user.php';
require_once '../include/Auth/LoginSessions.php';
?>

<?php
LoginSessions::startSession();
?>

<?php 
if(isset($_GET['login'])){
	$fileName="../resources/log.txt";
	$inLogInfo=null;
	$gettedLogInfo=null;
	$fm=new FileManager();
	if($_GET['login']=="pre"){
		$inLogInfo=new User(md5($_POST['username']), md5($_POST['password']));
		$gettedLogInfo=$fm->getFile($fileName);
		if($inLogInfo->getUsername()==md5("19andrea.m@gmail.com") && $inLogInfo->getPassword()==md5("andrea")){
			$_SESSION['user']=$inLogInfo->getName();
			$_SESSION['level']=$inLogInfo->getLevel();
			header("location:index.php");
		}
		else header("location:index.php?login=fail");
	}
	else if(@$_GET['login']=="stop"){
		LoginSessions::stopSession("../index.php");
	}
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description"
	content="Spiaggia dei Fiori Fano vi aspetta per una estate indimenticabile: servizi comodi e moderni in una bellissima location sulla costiera adriatica per la tua vacanza sulla sabbia.">
<meta name="keywords"
	content="Spiaggia,Fano,Estate,Vacanze,Mare,Costiera,Adriatica,Stabilimento Balneare,Ombrelloni,Sdraio">
<meta name="author" content="Andrea Marchetti">
<link rel="shortcut icon" href="../img/icons/favicon/ico.png">
<title>Spiaggia dei fiori Fano</title>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<!-- Bootstrap core CSS -->
<link href="../css/bootstrap.css" rel="stylesheet">

<!-- Custom CSS here -->
<link href="../css/style.css" rel="stylesheet">
<link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!-- Lightbox core CSS -->
<link href="../css/lightbox.css" rel="stylesheet" />
</head>

<body>
	<!-- Fixed navbar -->
	<div
		class="navbar navbar-default navbar-fixed-top navbar-transparent navbar-blue"
		role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<!--<a class="navbar-brand" href="index.html">Spiaggia dei fiori</a>-->
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="../index.php" title="Spiaggia dei Fiori home">Home</a>
					</li>
					<li><a href="../index.php#services" title="Servizi">Servizi</a></li>
					<li><a href="../index.php#beach" title="La spiaggia">La spiaggia</a>
					</li>
					<li><a href="../index.php#contacts" title="Contatti">Contatti e
							Location</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>

	<div style="background-color: #CCC; max-width: 1000px;"
		class="col-md-offset-2">
		<br> <br>
		<h1>Area riservata</h1>
		<hr>
		<?php 
		if(!isset($_SESSION) || count($_SESSION)==0 || @$_GET['login']=="fail"){
			echo "<div style='max-width: 270px; margin: 0 auto;'>
			<h4 class='text-center'>Effattua il login per accedere</h4>
			<form class='form-signin' role='form'
			action='index.php?login=pre' method='post'>
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
			echo"<div class='col-md-12'>";
			echo"<p>";
			echo"<a href='index.php'>".$_SESSION['user']."</a>";
			echo"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			echo"<a href='index.php?login=stop'>Logout</a>";
			echo"</p>";
			echo"</div>";

			echo"<hr>";

			echo"<p>Gestione eventi</p>";
			echo"<div class='col-md-3'>";
			echo"<a href='admin_functions.php?action=addEvent' class='btn btn-lg btn-default'>Aggiungi un evento</a>";
			echo"</div>";
			echo"<div class='col-md-3'>";
			echo"<a href='admin_functions.php?action=editEvent' class='btn btn-lg btn-default'>Modifica un evento</a>";
			echo"</div>";
			echo"<div class='col-md-3'>";
			echo"<a href='admin_functions.php?action=deleteEvent' class='btn btn-lg btn-default'>Rimuovi un evento</a>";
			echo"</div>";

			echo"<br><br><br><br><hr>";
			echo"<div class='col-md-3'>";
			echo"<p>Gestione listino prezzi</p>";
			echo"<a href='admin_functions.php?action=newList' class='btn btn-lg btn-default'>Nuovo listino proposta</a>";
			echo"</div>";
		}
		else{
			echo "<div class='alert alert-danger' style='width:200px;margin: 0 auto'>
			<button type='button' class='close' data-dismiss='alert'>&times;</button>
			Accesso non autorizzato
			</div>";
			echo"<br><a href='index.php'>Torna alla pagina di accesso</a>";
		}
		?>
	</div>


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="../js/jquery-1.10.2.js"></script>
	<script src="../js/bootstrap.js"></script>
</body>

</html>
