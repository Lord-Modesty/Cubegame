<?php

//try{
      
    $runde = $_GET['runde'];
    $guthaben = $_GET['guthaben'];
    $gesetzt = $_GET['gesetzt'];
    $gewinn_zahl = $_GET['gewinn_zahl'];
    $gewinn_farbe = $_GET['gewinn_farbe'];
    $gewinn_gerade = $_GET['gewinn_gerade'];
    $verloren = $_GET['verloren'];
    $gewonnen = $_GET['gewonnen'];
       
       $db_connection = new mysqli('localhost', 'root', '', 'leabergermaturaarbeit') or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
       $db_connection ->set_charset('utf8');
       
       if (mysqli_connect_errno()) {
           echo "Fehler aufgetreten: " . mysqli_connect_error();
           exit();
       } else {
           
           if ($stmt = $db_connection->prepare('INSERT INTO players (runde, guthaben,  gesetzt, gewinn_zahl, gewinn_farbe,gewinn_gerade, verloren,gewonnen)                     VALUES (?,?,?,?,?,?,?,?)')){
               
               $stmt-> bind_param('ssssssss', $runde, $guthaben,$gesetzt, $gewinn_zahl, $gewinn_farbe, $gewinn_gerade, $verloren, $gewonnen);
               $stmt->execute();
               $stmt->close();
               
           }
           else {
               printf("Errormessage: %s\n", $db_connection->error);
           }
           
           
           $_SESSION['filledGame'] = 'true';
           echo "Eintrag wurde erstellt. <a href=\"index.php\">Zurück</a>";
       }


   /* catch(){
        
    session_start();
    
    if(!isset($_SESSION['filledFormular']) && !isset($_SESSION['filledGame'])) {
       header('location: index.php');
    }
    else
    {

        if($_SESSION['filledFormular'] == 'false') {
				header('location: index.php');
			} else if($_SESSION['filledGame'] == 'false') {
				header('location: game.php');
			} else {
				header('location: end.php');
			}
    }

    } */ 
    
?>