<?php
    session_start();
    
    if(isset($_SESSION['playerProgress'])){
        switch ($_SESSION['playerProgress']) {
            case 0: // Not registered
                // do nothing, this is the correct page
                break;
            case 1: // Playing
                header('Location: game.php');
                break;
            case 2: // Done
                header('Location: end.php');
                break;
            default:
                // Assume this is the correct page
        }
    }
    else {
        // do nothing, this is the correct page
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <title>Lea Berger | Umfrage</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="cubeicon.png">
    
    <!-- Style -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.0/paper/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="row">
        <div class="col-lg-12 text-center">
            <legend>
                <h1>Lea Berger - Maturitätsarbeit</h1>
            </legend>
        </div>
    </div>
    
    <section id="infos">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2>Über mich</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h4>Bitte tragen Sie im Formular unten Ihre Daten ein und klicken Sie auf "Weiter".</h4>
                            <p class="text-muted glyphicon glyphicon-asterisk">
                                Die Daten werden vertraulich behandelt und nicht an Drittpersonen weitergegeben! Sie werden in Statistiken nicht namentlich erwähnt!
                            </p>
                        </div>
                    </div>
                    <form name="sentMessage" id="contactForm" action="index_script.php" method="post">
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="text" class="form-control" placeholder="Vorname" name="vorname" id="vorname" required data-validation-required-message="Bitte geben Sie ihr Geschlecht an.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="text" class="form-control" placeholder="Name" name="name" id="name" required data-validation-required-message="Bitte geben Sie ihr Geschlecht an.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="text" class="form-control" placeholder="Klasse" name="klasse" id="klasse" required data-validation-required-message="Bitte geben Sie ihr Geschlecht an.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="text" class="form-control" placeholder="Geschlecht" name="geschlecht" id="geschlecht" required data-validation-required-message="Bitte geben Sie ihr Geschlecht an.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="number" class="form-control" placeholder="Alter" name="age" id="age" required data-validation-required-message="Bitte geben Sie ihr Alter an.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="number" class="form-control" placeholder="Gewicht in Kilogramm" name="gewicht" id="gewicht" required data-validation-required-message="Bitte geben Sie ihr Gewicht an.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="number" class="form-control" placeholder="Grösse in Centimeter" name="groesse" id="groesse" required data-validation-required-message="Bitte geben Sie ihr Grösse an.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="number"min="0" max="10" class="form-control" placeholder="Hunger von 0 bis 10 (0 = Kein Hunger 10 = sehr grossen Hunger)" name="hunger" id="hunger" required data-validation-required-                                    message="Bitte geben Sie ihren Hunger an." title="0 = Kein Hunger 10 = sehr grossen Hunger">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" class="btn btn-success btn-lg put-right">
                                    Weiter
                                </button>
                            </div>
                        </div>
                    </form>
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
    
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
