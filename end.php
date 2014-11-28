<?php
/*	session_start();
   
    if(!isset($_SESSION['filledFormular']) && !isset($_SESSION['filledGame'])) {
        header('location: index.php');
    }
    else
    {

        if($_SESSION['filledFormular'] == 'false') {
				 header('location: index.php');
			} else if($_SESSION['filledGame'] == 'false') {
				header('location: game.php');
			} else {
				//Nothing
			}
    }*/

?>
<!DOCTYPE html>
<html lang="de">

	<head>
		<title>Lea Berger | Umfrage</title>

		<meta charset="utf-8">
		<link rel="shortcut icon" type="image/x-icon" href="cubeicon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

		<!-- Bootstrap -->
		<link href="//cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.0/paper/bootstrap.min.css" rel="stylesheet">

	</head>

	<body>

		<section>
			<div class="row">
				<div class="col-lg-12 text-center">
					<legend>
						<h1>Vielen Dank!</h1>
					</legend>
				</div>
			</div>

		</section>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
		
		<script type="text/javascript" src="game.js"></script>

	</body>

	<footer class="footer">
		<div class="container text-center">
			<p class="text-muted">
				Created by Nicola Bischof
			</p>
		</div>
	</footer>

</html>
