<?php
    session_start();
    
    // Get user input
    $vorname = $_POST['vorname'];
    $name = $_POST['name'];
    $klasse =  $_POST['klasse'];;
    $geschlecht = $_POST['geschlecht'];
    $age = $_POST['age'];
    $gewicht = $_POST['gewicht'];
    $groesse = $_POST['groesse'];
    $hunger = $_POST['hunger'];
    
    // Validate user input
    function isParameterValid($parameter) {
        return strlen(trim($parameter)) > 0;
    }
    
    $isUserInputValid = isParameterValid($vorname) && isParameterValid($name) && isParameterValid($klasse) &&
                        isParameterValid($geschlecht) && isParameterValid($age) && isParameterValid($gewicht) &&
                        isParameterValid($groesse) && isParameterValid($hunger);
    if (!$isUserInputValid) {
        // A player with missing data isn't allowed to play
        header('Location: index.php');
        exit(0);
    }
    
    // Create a database connection
    $database = new mysqli('localhost', 'root', '', 'leabergermaturaarbeit') or
      exit('Fehler: Verbindung zur Datenbank konnte nicht hergestellt werden');
    $database->set_charset('utf8');
    
    if (mysqli_connect_errno()) {
        exit('Fehler: ' . mysqli_connect_error());
    }
    
    // Create a new player
    if ($query = $database->prepare('INSERT INTO players ' . 
                                    '(vorname, name, klasse, geschlecht, age, gewicht, groesse, hunger) ' .
                                    'VALUES (?, ?, ?, ?, ?, ?, ?, ?)')) {
        $query->bind_param('ssssssss', $vorname, $name, $klasse, $geschlecht, $age, $gewicht, $groesse, $hunger);
        $query->execute();
        $query->close();
    }
    else {
        exit('Fehler: ' . $database->error);
    }
    
    // Retrieve the id of the newly created player
    $playerId = $database->insert_id;
    
    // Close the database connection
    $database->close();
    
    // Redirect to the next page
    $_SESSION['playerId'] = $playerId;
    $_SESSION['playerProgress'] = 1; // 0 = Not registered, 1 = Playing, 2 = Done
    
    header('Location: game.php');
?>
