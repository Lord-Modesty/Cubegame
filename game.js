var round = 1;
var credit = 10;

var gesetzt;
var winningNumber;
var winningColor;
var winningEven;

var amountLost = 0;
var amountWon = 0;


function setBet(einsatz) {
    // Update bet
    switch (einsatz) {
        case '1':
            gesetzt = 1;
            break;
        case '2':
            gesetzt = 2;
            break;
        case '3':
            gesetzt = 3;
            break;
        case '4':
            gesetzt = 4;
            break;
        case '5':
            gesetzt = 5;
            break;
        case '6':
            gesetzt = 6;
            break;
        case 'Rot':
            gesetzt = 7;
            break;
        case 'Lila':
            gesetzt = 8;
            break;
        case 'Orange':
            gesetzt = 9;
            break;
        case 'Gerade':
            gesetzt = 10;
            break;
        case 'Ungerade':
            gesetzt = 11;
            break;
        default:
            console.error("Encountered an unhandled bet choice");
    }
    
    // Update UI
    $('#einsatz').text("Auf : " + einsatz);
    
    $("#play").removeAttr("disabled");
};


function play() {
    if (credit <= 0) {
        // All rounds played, redirect to the next page
        window.location.replace('end.php');
    } else {
        credit -= 1;
        $('#guthaben').text(credit + ".-")
        
        rollTheDice();
        winCheck();
        
        sendRoundResultToServer();
        
        round += 1;
    };
};

function rollTheDice() {
    // Roll the dice
    winNumber = Math.floor((Math.random() * 6) + 1);
    
    // Update winning numbers
    switch (winNumber) {
        case 1:
            winningNumber = 1;
            winningColor = 7;
            winningEven = 11;
            break;

        case 2:
            winningNumber = 2;
            winningColor = 7;
            winningEven = 10;
            break;

        case 3:
            winningNumber = 3;
            winningColor = 8;
            winningEven = 11;
            break;

        case 4:
            winningNumber = 4;
            winningColor = 8;
            winningEven = 10;
            break;

        case 5:
            winningNumber = 5;
            winningColor = 9;
            winningEven = 11;
            break;

        case 6:
            winningNumber = 6;
            winningColor = 9;
            winningEven = 10;
            break;
        
        default:
            console.error("Encountered an unhandled dice value");
    }
    
    // Update UI
    $("#cube").removeClass();
    $("#cube").addClass('label label-default');
    $('#cube').text(winNumber);
}

function winCheck() {
    if (winningNumber == gesetzt) {
        amountWon += 6;
        $('#statustext').addClass('text-success').removeClass('text-danger');
        $('#statustext').text("Gewonnen!");
        $('#gewonnen').text(amountWon + ".-");
    
    } else if (winningColor == gesetzt) {
        amountWon += 3;
        $('#statustext').addClass('text-success').removeClass('text-danger');
        $('#statustext').text("Gewonnen!");
        $('#gewonnen').text(amountWon + ".-");
    
    } else if (winningEven == gesetzt) {
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
      "&gesetzt=" + gesetzt + 
      "&gewinn_zahl=" + winningNumber + 
      "&gewinn_farbe=" + winningColor + 
      "&gewinn_gerade=" + winningEven + 
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
            
            // TODO: Ask for error alert message content
            alert("Beim Übermitteln des Rundenergebnisses zum Server ist ein Fehler aufgetreten!\n" + 
                  "Bitte überprüfen Sie Ihre Internetverbindung.");
        })
        .always (function () {
            // Re-enable the play and bet buttons
            $("#play").removeAttr("disabled");
            $("#bet").removeAttr("disabled");
        });
}
