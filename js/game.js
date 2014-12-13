var round = 1;
var credit = 10;

var diceChoice;
var winningNumber;
var winningColor;

var amountLost = 0;
var amountWon = 0;


function play() {
    if (credit <= 0) {
        // All rounds played, redirect to the next page
        window.location.replace('end_script.php');
    } else {
        rollTheDice();
        checkForWin();
        
        credit -= 1;
        $('#guthaben').text(credit + ".-")
        
        sendRoundResultToServer();
        
        round += 1;
    };
};

function rollTheDice() {
    // Roll the dice
    winNumber = Math.floor((Math.random() * 6) + 1);
    
    // Update UI
    $("#cube-title").removeClass('hidden');
    $("#cube").removeClass();
    $('#cube').text(winNumber);
    
    // Update winning numbers
    switch (winNumber) {
        case 1:
            winningNumber = 1;
            winningColor = 7;
            $("#cube").addClass('label label-danger');
            break;
            
        case 2:
            winningNumber = 2;
            winningColor = 7;
            $("#cube").addClass('label label-danger');
            break;
            
        case 3:
            winningNumber = 3;
            winningColor = 8;
            $("#cube").addClass('label label-info');
            break;
            
        case 4:
            winningNumber = 4;
            winningColor = 8;
            $("#cube").addClass('label label-info');
            break;
            
        case 5:
            winningNumber = 5;
            winningColor = 9;
            $("#cube").addClass('label label-warning');
            break;
            
        case 6:
            winningNumber = 6;
            winningColor = 9;
            $("#cube").addClass('label label-warning');
            break;
            
        default:
            console.error("Encountered an unhandled dice value");
    }
}

function checkForWin() {
    if (diceChoice == winningNumber) {
        amountWon += 6;
        $('#statustext').addClass('text-success').removeClass('text-danger');
        $('#statustext').text("Gewonnen!");
        $('#gewonnen').text(amountWon + ".-");
        
    } else if (diceChoice == winningColor) {
        amountWon += 3;
        $('#statustext').addClass('text-success').removeClass('text-danger');
        $('#statustext').text("Gewonnen!");
        $('#gewonnen').text(amountWon + ".-");
        
    } else if ((diceChoice == 10 && winningNumber % 2 == 0) ||
               (diceChoice == 11 && winningNumber % 2 != 0)) {
        amountWon += 2;
        $('#statustext').addClass('text-success').removeClass('text-danger');
        $('#statustext').text("Gewonnen!");
        $('#gewonnen').text(amountWon + ".-");
        
    } else {
        amountLost += 1;
        $('#statustext').addClass('text-danger').removeClass('text-success');
        $('#statustext').text("Verloren!");
        $('#verloren').text(amountLost + ".-");
    }
};


function setDiceChoice(newChoice) {
    // Update dice choice
    switch (newChoice) {
        case '1':
            diceChoice = 1;
            break;
        case '2':
            diceChoice = 2;
            break;
        case '3':
            diceChoice = 3;
            break;
        case '4':
            diceChoice = 4;
            break;
        case '5':
            diceChoice = 5;
            break;
        case '6':
            diceChoice = 6;
            break;
            
        case 'Rot':
            diceChoice = 7;
            break;
        case 'Lila':
            diceChoice = 8;
            break;
        case 'Orange':
            diceChoice = 9;
            
            break;
        case 'Gerade':
            diceChoice = 10;
            break;
        case 'Ungerade':
            diceChoice = 11;
            break;
        default:
            console.error("Encountered an unhandled bet choice");
    }
    
    // Update UI
    $('#einsatz').text("Auf : " + newChoice);
    
    $("#play").removeAttr("disabled");
};


function sendRoundResultToServer() {
    // Disable the play button, to prevent lost games because the unfinished
    // AJAX request could get cancelled by the quickly started new game
    $("#play").attr("disabled", "disabled");
    
    // Disable the bet button too, because changing it would
    // re-enable the play button
    $("#bet").attr("disabled", "disabled");
    
    
    // Build HTTP parameter string
    var playerId = $('#player_id').val();
    
    var httpParameters = "?runde=" + round + 
      "&guthaben=" + credit + 
      "&gesetzt=" + diceChoice + 
      "&gewinn_zahl=" + winningNumber + 
      "&gewinn_farbe=" + winningColor + 
      "&verloren=" + amountLost + 
      "&gewonnen=" + amountWon + 
      "&player_id=" + playerId;
    
    // Send the round result to the server
    $.ajax('game_script.php' + httpParameters)
        .done(function (data) {
            console.log("Round result successfully sent to server");
        })
        .error(function (xhr, status, error) {
            console.error('Failed to send round result to server (' + status + '): ' + xhr.responseText);
            
            // TODO: Ask how to handle this kind of error
            alert("Beim Übermitteln des Rundenergebnisses zum Server ist ein Fehler aufgetreten!\n" + 
                  "Bitte überprüfen Sie Ihre Internetverbindung.");
        })
        .always (function () {
            // Re-enable the play and bet buttons
            $("#play").removeAttr("disabled");
            $("#bet").removeAttr("disabled");
        });
}
