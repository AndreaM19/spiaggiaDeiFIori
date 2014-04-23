<?php
require_once 'include/Events/Event.php';
require_once 'include/File_management/FileManager.php';
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
					<h1 class="cover-heading">Benvenuto!!</h1>
					<hr>
					<p class="lead dark">Scopri tutti i nostri servizi, le offerte e le
						attrazioni che offriamo per un'estate indimenticabile sulla
						riviera di Fano</p>
					<p class="lead">
						<a href="#" class="btn btn-lg btn-default">Proposta 2014</a>
					</p>
					<br>
					<h4 class="cover-heading">Eventi 2014</h4>
					<hr>
					<?php 
					$fileName="resources/events.txt";
					$fm=new FileManager();//istanza per le utility sui file
					$eventsList=$fm->getFile($fileName);
					$arraySize=count($eventsList);
					if($arraySize==0) echo "<p>Coming soon...</p>";
					else{
						echo"<table class='table'>";
						for($i=0; $i<$arraySize; $i++){
							$e=$eventsList[$i];
							echo"<tr>";
							echo"<td>".$e->getTitle()."</td>";
							echo"<td>".$e->getDate()."</td>";
							echo"<td><a href='".$e->getAlbumLink()."' target='_blank'>".$e->getAlbumLink()."</a></td>";
							echo"</tr>";
						}
						echo"</table>";
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
