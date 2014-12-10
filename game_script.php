<?php
    session_start();
    
    // Get user input
    $round = $_GET['runde'];
    $credit = $_GET['guthaben'];
    $gesetzt = $_GET['gesetzt'];
    $winningNumber = $_GET['gewinn_zahl'];
    $winningColor = $_GET['gewinn_farbe'];
    $winningEven = $_GET['gewinn_gerade'];
    $amountLost = $_GET['verloren'];
    $amountWon = $_GET['gewonnen'];
    $playerId = $_GET['player_id'];
    
    // Create a database connection
    $database = new mysqli('localhost', 'root', '', 'leabergermaturaarbeit') or
      exit('Fehler: Verbindung zur Datenbank konnte nicht hergestellt werden');
    $database->set_charset('utf8');
    
    if (mysqli_connect_errno()) {
        exit('Fehler: ' . mysqli_connect_error());
    }
    
    // Insert a new round result
     if ($query = $database->prepare('INSERT INTO games ' .
                                     '(runde, guthaben,  gesetzt, gewinn_zahl, gewinn_farbe,gewinn_gerade, verloren, gewonnen, player_id) ' .
                                     'VALUES (?,?,?,?,?,?,?,?,?)')) {
        $query->bind_param('iiiiiiiii', $round, $credit, $gesetzt, $winningNumber, $winningColor, $winningEven, $amountLost, $amountWon, $playerId);
        $query->execute();
        $query->close();
    }
    else {
        exit('Fehler: ' . $database->error);
    }
    
    // Update the amount won
    $_SESSION['gewonnen'] = $amountWon;
    
    // Close the database connection
    $database->close();
?>
