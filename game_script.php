<?php
    session_start();
    $runde = $_GET['runde'];
    $guthaben = $_GET['guthaben'];
    $gesetzt = $_GET['gesetzt'];
    $gewinn_zahl = $_GET['gewinn_zahl'];
    $gewinn_farbe = $_GET['gewinn_farbe'];
    $gewinn_gerade = $_GET['gewinn_gerade'];
    $verloren = $_GET['verloren'];
    $gewonnen = $_GET['gewonnen'];
    $player_id = $_GET['player_id'];
       
       $db_connection = new mysqli('localhost', 'root', '', 'leabergermaturaarbeit') or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
       $db_connection ->set_charset('utf8');
       
       if (mysqli_connect_errno()) {
           echo "Fehler aufgetreten: " . mysqli_connect_error();
           exit();
       } else {
           
           if ($stmt = $db_connection->prepare('INSERT INTO game (runde, guthaben,  gesetzt, gewinn_zahl, gewinn_farbe,gewinn_gerade, verloren,gewonnen, player_id) VALUES (?,?,?,?,?,?,?,?,?)')){
               $stmt-> bind_param('iiiiiiiii', $runde, $guthaben,$gesetzt, $gewinn_zahl, $gewinn_farbe, $gewinn_gerade, $verloren, $gewonnen, $player_id);
               $stmt->execute();
               $stmt->close();
               
               $_SESSION['gewonnen'] = $gewonnen;
               
           }
           else {
               printf("Errormessage: %s\n", $db_connection->error);
           }
           
       }    
?>