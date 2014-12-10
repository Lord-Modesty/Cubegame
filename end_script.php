<?php
    session_start();
    
    // Update the player progress
    $_SESSION['playerProgress'] = 2; // 0 = Not registered, 1 = Playing, 2 = Done
    
    // Redirect
    header('Location: game.php');
?>
