<?php

session_start();
if(isset($_SESSION['gameReached'])){
      
}else if(isset($_SESSION['endReached'])){
    header('location: end.php');
}
else{
  header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="de">

	<head>
		<title>Lea Berger | Umfrage</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="shortcut icon" type="image/x-icon" href="cubeicon.png">
		
		<!-- Bootstrap -->
		<link href="//cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.0/paper/bootstrap.min.css" rel="stylesheet">

	</head>

	<body>

		<section>
			<div class="container ">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h1>Würfelspiel</h1>
                         <input id="player_id" type="hidden" name="UserBrowser" value="<?php echo $_SESSION['player_id'] ?>">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<p>
							Bitte setzen Sie auf eine Zahl,eine Farbe oder eine gerade beziehungsweise ungerade Zahl und klicken dann "Würfeln"!
							Der Einsatz beträgt immer <span class="label label-success">1 CHF</span>!
						</p>
						<ul>
							<li>
								Einsatz x6 : Zahl
							</li>
							<li>
								Einsatz x3 : Farbe, Rot(1,2) Lila(3,4) Orange(5,6)
							</li>
							<li>
								Einsatz x2 : Gerade/Ungerade Zahl
							</li>
						</ul>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<h3>Guthaben:<span id="guthaben" class="label label-success pull-right">10.-</span></h3>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<h4>Gewonnen:<span id="gewonnen" class="label label-primary pull-right">0.-</span></h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<h4>Verloren:<span id="verloren" class="label label-danger pull-right">0.-</span></h4>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<p class="text-muted">
							<span class="badge">1 </span>Auf was wollen Sie setzen?
							<br />
							<span class="badge">2 </span>Würfeln!
							<br />
						</p>
						
							<a id="einsatz" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Auf : <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li>
									<a onclick="setBet('1')" class="btn btn-default">1</a>
								</li>
								<li>
									<a onclick="setBet('2')" class="btn btn-default">2</a>
								</li>
								<li>
									<a onclick="setBet('3')" class="btn btn-default">3</a>
								</li>
								<li>
									<a onclick="setBet('4')" class="btn btn-default">4</a>
								</li>
								<li>
									<a onclick="setBet('5')" class="btn btn-default">5</a>
								</li>
								<li>
									<a onclick="setBet('6')" class="btn btn-default">6</a>
								</li>
								<li class="divider"></li>
								<li>
									<a onclick="setBet('Rot')" class="btn btn-default">Rot</a>
								</li>
								<li>
									<a onclick="setBet('Lila')" class="btn btn-default">Lila</a>
								</li>
								<li>
									<a onclick="setBet('Orange')" class="btn btn-default">Orange</a>
								</li>
								<li class="divider"></li>
								<li>
									<a onclick="setBet('Gerade')" class="btn btn-default">Gerade</a>
								</li>
								<li>
									<a onclick="setBet('Ungerade')" class="btn btn-default">Ungerade</a>
								</li>
							</ul>
							<a onclick="wuerfeln()" class="btn btn-success pull-right">Würfeln</a>
						
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<h2>Gewürfelt:<span id="cube" class="label label-default"></span></h2>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<h1 id="statustext" class="text-success"></h1>
					</div>
				</div>

		</section>
		
		<footer class="footer">
			<div class="container text-center">
				<p class="text-muted">
					Created by Nicola Bischof
				</p>
			</div>
		</footer>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
		
		<script type="text/javascript" src="game.js"></script>

	</body>

</html>
