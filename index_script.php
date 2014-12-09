<?php

        session_start();
        $_SESSION['gameReached'] = true;
		$vorname = $_POST['vorname'];
		$name = $_POST['name'];
        $klasse =  $_POST['klasse'];;
		$geschlecht = $_POST['geschlecht'];
        $age = $_POST['age'];
		$gewicht = $_POST['gewicht'];
        $groesse = $_POST['groesse'];
		$hunger = $_POST['hunger'];
		        
        $db_connection = new mysqli('localhost', 'root', '', 'leabergermaturaarbeit') or die("Verbindung zur Datenbank konnte nicht hergestellt werden");
        $db_connection ->set_charset('utf8');

		if (mysqli_connect_errno()) {
			echo "Fehler aufgetreten: " . mysqli_connect_error();
			exit();
		} else {
                
                if ($stmt = $db_connection->prepare('INSERT INTO players (vorname, name,  klasse, geschlecht, age,gewicht,groesse,hunger) VALUES (?,?,?,?,?,?,?,?)')) {
                    
                    $stmt-> bind_param('ssssssss', $vorname, $name, $klasse, $geschlecht, $age, $gewicht, $groesse, $hunger);
                    $stmt->execute();
                    $stmt->close();
                    
                    $querry = "SELECT player_id FROM players";
                    $result = $db_connection->query($querry);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                        $_SESSION['player_id'] = $row["player_id"];
                        }
                    } else {
                        echo "0 results";
                    }
                    $db_connection->close();

                }
                else {
                    printf("Errormessage: %s\n", $db_connection->error);
                }
            
			header('location: game.php');
        }
    
?>