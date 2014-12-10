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
    <title>Umfrage | Maturitätsarbeit Lea Berger</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="cubeicon.png">
    
    <!-- Style -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.0/paper/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <section>
        <div class="container ">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>Würfelspiel</h1>
                    <input id="player_id" type="hidden" name="UserBrowser" value="<?php echo $_SESSION['playerId'] ?>">
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
                            Setze auf Zahl: Gewinn = Einsatz x6
                        </li>
                        <li>
                            Setze auf Farbe: Gewinn = Einsatz x3
                        </li>
                        <li>
                            Setze auf gerade/ ungerade: Gewinn = Einsatz x2
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
                <div class="col-md-4 col-md-offset-4">
                    <h2>Gewürfelt: <span id="cube" class="label label-default"></span></h2>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h1 id="statustext" class="text-success"></h1>
                </div>
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
    
    <!-- Scripts-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="game.js"></script>
</body>
</html>
