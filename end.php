<?php
    session_start();
    
    if(isset($_SESSION['playerProgress'])){
        switch ($_SESSION['playerProgress']) {
            case 0: // Not registered
                header('Location: index.php');
                break;
            case 1: // Playing
                header('Location: game.php');
                break;
            case 2: // Done
                // do nothing, this is the correct page
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
    <title>Ende | Maturitätsarbeit Lea Berger</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="shortcut icon" type="image/x-icon" href="cubeicon.png">
    
    <!-- Style -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/bootswatch/3.3.0/paper/bootstrap.min.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="wrapper container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Vielen Dank!</h1>
            </div>
        </div>
        <br />
        <div class="row">
            <div class="col-lg-12 text-center">
                <p class="text text-big">
                    Glückwunsch, Sie haben <span class="label label-success"><?php echo $_SESSION['gewonnen'] ?>.-</span> Gewonnen!
                </p>
                <p class="text text-medium">
                    Ihre Resultate wurden gespeichert.
                </p>
            </div>
        </div>
    </div>
    
    <footer class="footer container">
        <br />
        <div class="text-center">
            <p class="text-muted">
                Created by Nicola Bischof
            </p>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="game.js"></script>
</body>
</html>
