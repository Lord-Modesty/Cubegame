<?php
    session_start();
    
    if(isset($_SESSION['playerProgress'])){
        switch ($_SESSION['playerProgress']) {
            case 0: // Not registered
                header('Location: index.php');
                break;
            case 1: // Playing
                // do nothing, this is the correct page
                break;
            case 2: // Done
                header('Location: end.php');
                break;
            default:
                // Assume this is the correct page
        }
    }
    else {
        header('Location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Würfelspiel | Maturitätsarbeit Lea Berger</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="cubeicon.png">
    
    <!-- Style -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.0/paper/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="noscript container">
        <div class="row text-center">
		    <div class="col-lg-12">
                <br />
                <p class="text text-big">
                    JavaScript scheint ausgeschaltet zu sein
                </p>
                <p>
                    Diese Website benötigt JavaScript um korrekt funktionieren zu können.<br />
                    Bitte schalten Sie JavaScript an und <a href="." title="Seite aktualisieren">aktualisieren</a> Sie die Seite.
                </p>
			</div>
        </div>
    </div>
    
    <div class="wrapper container" style="display: none;">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Lea Berger - Maturitätsarbeit</h1>
                <hr />
                <h2>Würfelspiel</h2>
                
                <input id="player_id" type="hidden" name="UserBrowser" value="<?php echo $_SESSION['playerId'] ?>">
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <p>
                    Bitte setzen Sie auf eine Zahl, eine Farbe oder eine gerade beziehungsweise ungerade Zahl und klicken dann "Würfeln"!
                    Der Einsatz beträgt immer <span class="label label-success">1 CHF</span>!
                </p>
                <ul>
                    <li>
                        Setzen auf Zahl: Gewinn = Einsatz x6
                    </li>
                    <li>
                        Setzen auf Farbe: Gewinn = Einsatz x3
                    </li>
                    <li>
                        Setzen auf gerade/ ungerade: Gewinn = Einsatz x2
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <h3 style="margin-top: 15px;">Guthaben:<span id="guthaben" class="label label-success pull-right">10.-</span></h3>
                <h4>Gewonnen:<span id="gewonnen" class="label label-primary pull-right">0.-</span></h4>
                <h4>Verloren:<span id="verloren" class="label label-danger pull-right">0.-</span></h4>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <p class="text-muted">
                    <span class="badge">1</span> Auf was wollen Sie setzen?
                    <br />
                    <span class="badge">2</span> Würfeln!
                    <br />
                </p>
                
                <a id="einsatz" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Auf : - <span class="caret"></span></a>
                <ul id="bet" class="dropdown-menu">
                    <li>
                        <a onclick="setDiceChoice('1')" class="btn btn-default">1</a>
                    </li>
                    <li>
                        <a onclick="setDiceChoice('2')" class="btn btn-default">2</a>
                    </li>
                    <li>
                        <a onclick="setDiceChoice('3')" class="btn btn-default">3</a>
                    </li>
                    <li>
                        <a onclick="setDiceChoice('4')" class="btn btn-default">4</a>
                    </li>
                    <li>
                        <a onclick="setDiceChoice('5')" class="btn btn-default">5</a>
                    </li>
                    <li>
                        <a onclick="setDiceChoice('6')" class="btn btn-default">6</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a onclick="setDiceChoice('Rot')" class="btn btn-default">Rot</a>
                    </li>
                    <li>
                        <a onclick="setDiceChoice('Lila')" class="btn btn-default">Lila</a>
                    </li>
                    <li>
                        <a onclick="setDiceChoice('Orange')" class="btn btn-default">Orange</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a onclick="setDiceChoice('Gerade')" class="btn btn-default">Gerade</a>
                    </li>
                    <li>
                        <a onclick="setDiceChoice('Ungerade')" class="btn btn-default">Ungerade</a>
                    </li>
                </ul>
                <a id="play" class="btn btn-success pull-right" disabled="disabled" onclick="play()">Würfeln</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <h2 id="cube-title" class="hidden">Gewürfelt: <span id="cube" class="label label-default"></span></h2>
                <h1 id="statustext" class="text-success"></h1>
            </div>
        </div>
    </div>
    
    <footer>
        <br />
        <div class="text-center">
            <p class="text-muted">
                Created by Nicola Bischof
            </p>
        </div>
    </footer>
    
    
    <!-- Scripts-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/game.js"></script>
    <script type="text/javascript" src="js/noscript.js"></script>
</body>
</html>
