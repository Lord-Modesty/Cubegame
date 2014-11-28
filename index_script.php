<?php

	//try{
        
		$vorname = $_POST['vorname'];
		$name = $_POST['name'];
        $klasse =  $_POST['klasse'];;
		$geschlecht = $_POST['geschlecht'];
        $age = $_POST['age'];
		$gewicht = $_POST['gewicht'];
        $groesse = $_POST['groesse'];
		$hunger = $_POST['hunger'];
		        

		//$db_connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASS, MYSQL_DBNAME) or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
        $db_connection = new mysqli('localhost', 'root', '', 'leabergermaturaarbeit');
        $db_connection ->set_charset('utf8');

		if (mysqli_connect_errno()) {
			echo "Fehler aufgetreten: " . mysqli_connect_error();
			exit();
		} else {
                
                if ($stmt = $db_connection->prepare('INSERT INTO players (vorname, name,  klasse, geschlecht, age,gewicht,groesse,hunger) VALUES (?,?,?,?,?,?,?,?)')) {
                    
                    $stmt-> bind_param('ssssssss', $vorname, $name, $klasse, $geschlecht, $age, $gewicht, $groesse, $hunger);
                    $stmt->execute();
                    $stmt->close();

                }
                else {
                    printf("Errormessage: %s\n", $db_connection->error);
                }
                
              
            $_SESSION['filledFormular'] = 'true';
			header('location: game.php');
        }
    // }
    /*catch(){
        
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

    }  */
    
?>