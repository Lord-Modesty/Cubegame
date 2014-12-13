<?php
    session_start();
    
    // Get user input
    $playerId = $_GET['player_id'];
    $round = $_GET['runde'];
    $credit = $_GET['restguthaben'];
    $gesetzt = $_GET['gesetzt'];
    $diced = $_GET['gewuerfelt'];
    $amountLost = $_GET['menge_verloren'];
    $amountWon = $_GET['menge_gewonnen'];
    
    // Validate user input
	function isParameterValid($parameter) {
        return strlen(trim($parameter)) > 0;
    }
	
    $isUserInputValid = isParameterValid($playerId) && isParameterValid($round) && isParameterValid($credit) &&
                        isParameterValid($gesetzt) && isParameterValid($diced) &&
                        isParameterValid($amountLost) && isParameterValid($amountWon);
    if (!$isUserInputValid) {
        // A round with missing data can't be logged
        exit(0);
    }
    
    // Create a database connection
    $database = new mysqli('localhost', 'root', '', 'leabergermaturaarbeit') or
      exit('Fehler: Verbindung zur Datenbank konnte nicht hergestellt werden');
    $database->set_charset('utf8');
    
    if (mysqli_connect_errno()) {
        exit('Fehler: ' . mysqli_connect_error());
    }
    
    // Insert a new round result
    if ($query = $database->prepare('INSERT INTO games ' .
                                    '(player_id, runde, restguthaben, gesetzt, gewuerfelt, menge_verloren, menge_gewonnen) ' .
                                    'VALUES (?, ?, ?, ?, ?, ?, ?)')) {
        $query->bind_param('iiiiiii', $playerId, $round, $credit, $gesetzt, $diced, $amountLost, $amountWon);
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
