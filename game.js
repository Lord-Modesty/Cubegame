var guthaben = 10;
var runde = 0;
var gesetzt;
var gewinn_zahl;
var gewinn_farbe;
var gewinn_gerade;
var verloren = 0;
var gewonnen = 0;
var player_id = $('#player_id').val();

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
    if (guthaben <= 0) {
        // All rounds played, redirect to the next page
        $(location).attr('href', 'end.php');
    } else {
        // Play a round
        runde = runde + 1;
	    
        guthaben = guthaben - 1;
        $('#guthaben').text(guthaben + ".-")
        
        rollTheDice();
        winCheck();
    };
};

function rollTheDice() {
    // Roll the dice
    winNumber = Math.floor((Math.random() * 6) + 1);
    
    // Update winning numbers
    switch (winNumber) {
        case 1:
            gewinn_zahl = 1;
            gewinn_farbe = 7;
            gewinn_gerade = 11;
            break;

        case 2:
            gewinn_zahl = 2;
            gewinn_farbe = 7;
            gewinn_gerade = 10;
            break;

        case 3:
            gewinn_zahl = 3;
            gewinn_farbe = 8;
            gewinn_gerade = 11;
            break;

        case 4:
            gewinn_zahl = 4;
            gewinn_farbe = 8;
            gewinn_gerade = 10;
            break;

        case 5:
            gewinn_zahl = 5;
            gewinn_farbe = 9;
            gewinn_gerade = 11;
            break;

        case 6:
            gewinn_zahl = 6;
            gewinn_farbe = 9;
            gewinn_gerade = 10;
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
    if (gewinn_zahl == gesetzt) {
        gewonnen = gewonnen + 6;
        $('#statustext').addClass('text-success').removeClass('text-danger');
        $('#statustext').text("Gewonnen!");
        $('#gewonnen').text(gewonnen + ".-");

    } else if (gewinn_farbe == gesetzt) {
        gewonnen = gewonnen + 3;
        $('#statustext').addClass('text-success').removeClass('text-danger');
        $('#statustext').text("Gewonnen!");
        $('#gewonnen').text(gewonnen + ".-");

    } else if (gewinn_gerade == gesetzt) {
        gewonnen = gewonnen + 2;
        $('#statustext').addClass('text-success').removeClass('text-danger');
        $('#statustext').text("Gewonnen!");
        $('#gewonnen').text(gewonnen + ".-");
    } else {
        verloren = verloren + 1;
        $('#statustext').addClass('text-danger').removeClass('text-success');
        $('#statustext').text("Verloren!");
        $('#verloren').text(verloren + ".-");
    }
    
    sendRoundResultToServer();
};


function sendRoundResultToServer() {
    // Disable the play button, to prevent lost games because the unfinished
    // AJAX request could get cancelled by the quickly started new game
    $("#play").attr("disabled", "disabled");
    
    // Disable the bet button too, because changing it would
    // re-enable the play button
    $("#bet").attr("disabled", "disabled");
    
    
    // Build HTTP parameter string
    var httpParameters = "?runde=" + runde + 
      "&guthaben=" + guthaben + 
      "&gesetzt=" + gesetzt + 
      "&gewinn_zahl=" + gewinn_zahl + 
      "&gewinn_farbe=" + gewinn_farbe + 
      "&gewinn_gerade=" + gewinn_gerade + 
      "&verloren=" + verloren+ 
      "&gewonnen=" + gewonnen+ 
      "&player_id=" + player_id;
    
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
