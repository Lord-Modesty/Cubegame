<?php
    session_start();
    
    // Get user input
    $playerId = $_GET['player_id'];
    $round = $_GET['runde'];
    $credit = $_GET['guthaben'];
    $gesetzt = $_GET['gesetzt'];
    $winningNumber = $_GET['gewinn_zahl'];
    $winningColor = $_GET['gewinn_farbe'];
    $amountLost = $_GET['verloren'];
    $amountWon = $_GET['gewonnen'];
    
    // Create a database connection
    $database = new mysqli('localhost', 'root', '', 'leabergermaturaarbeit') or
      exit('Fehler: Verbindung zur Datenbank konnte nicht hergestellt werden');
    $database->set_charset('utf8');
    
    if (mysqli_connect_errno()) {
        exit('Fehler: ' . mysqli_connect_error());
    }
    
    // Insert a new round result
     if ($query = $database->prepare('INSERT INTO games ' .
                                     '(player_id, runde, guthaben,  gesetzt, gewinn_zahl, gewinn_farbe, verloren, gewonnen) ' .
                                     'VALUES (?, ?, ?, ?, ?, ?, ?, ?)')) {
        $query->bind_param('iiiiiiii', $playerId, $round, $credit, $gesetzt, $winningNumber, $winningColor, $amountLost, $amountWon);
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
