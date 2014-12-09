var Guthaben = 10;
var runde = 0;
var gesetzt;
var gewinn_zahl;
var gewinn_farbe;
var gewinn_gerade;
var verloren = 0;
var gewonnen = 0;
var player_id = $('#player_id').val();

function wuerfeln() {
    setGuthaben();
	winCheck();
	
    if (Guthaben <= 0) {
        $(location).attr('href', 'end.php');
    } else if (gesetzt == null) {
        alert("Auf was wollen Sie setzen?");
    } else {
        runde = runde + 1;
        winNumber = Math.floor((Math.random() * 6) + 1)
        switch (winNumber) {
        case (1):
            $("#cube").removeClass();
            $("#cube").addClass('label label-danger');
            $('#cube').text(winNumber);
            gewinn_zahl = 1;
            gewinn_farbe = 7;
            gewinn_gerade = 11;
            break;

        case (2):
            $("#cube").removeClass();
            $("#cube").removeClass();
            $("#cube").addClass('label label-danger');
            $('#cube').text(winNumber);
            gewinn_zahl = 2;
            gewinn_farbe = 7;
            gewinn_gerade = 10;
            break;

        case (3):
            $("#cube").removeClass();
            $("#cube").addClass('label label-info');
            $('#cube').text(winNumber);
            gewinn_zahl = 3;
            gewinn_farbe = 8;
            gewinn_gerade = 11;
            break;

        case (4):
            $("#cube").removeClass();
            $("#cube").addClass('label label-info');
            $('#cube').text(winNumber);
            gewinn_zahl = 4;
            gewinn_farbe = 8;
            gewinn_gerade = 10;
            break;

        case (5):
            $("#cube").removeClass();
            $("#cube").addClass('label label-warning');
            $('#cube').text(winNumber);
            gewinn_zahl = 5;
            gewinn_farbe = 9;
            gewinn_gerade = 11;
            break;

        case (6):
            $("#cube").removeClass();
            $("#cube").addClass('label label-warning');
            $('#cube').text(winNumber);
            gewinn_zahl = 6;
            gewinn_farbe = 9;
            gewinn_gerade = 10;
            break;

        }
    };
};

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
    
    ajaxFunction();
};

function setBet(value) {

    setEinsatzvalue(value);
    $('#einsatz').text("Auf : " + value);

};

function setGuthaben() {
    if (Guthaben <= 0) {
        alert("Guthaben fertig");
    } else if (gesetzt == null) {

    } else {
        Guthaben = Guthaben - 1;
        $('#guthaben').text(Guthaben + ".-")
    }
};

function setEinsatzvalue(einsatz) {

    switch (einsatz) {
    case ('1'):
        gesetzt = 1;
        break;

    case ('2'):
        gesetzt = 2;
        break;

    case ('3'):
        gesetzt = 3;
        break;

    case ('4'):
        gesetzt = 4;
        break;

    case ('5'):
        gesetzt = 5;
        break;

    case ('6'):
        gesetzt = 6;
        break;

    case ('Rot'):
        gesetzt = 7;
        break;

    case ('Lila'):
        gesetzt = 8;
        break;

    case ('Orange'):
        gesetzt = 9;
        break;

    case ('Gerade'):
        gesetzt = 10;
        break;

    case ('Ungerade'):
        gesetzt = 11;
        break;
    }

};

function ajaxFunction() {
    // Disable the play button, to prevent lost games because the unfinished
    // AJAX request could get cancelled by the quickly started new game
    $("#play").attr("disabled", "disabled");
    
    var ajaxRequest; // The variable that makes Ajax possible!
    
    try {
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    } catch (e) {
        // Internet Explorer Browsers
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                // Something went wrong
                alert("Your browser broke!");
                return false;
            }
        }
    }
    // Create a function that will receive data 
    // sent from the server and will update
    // div section in the same page.
    ajaxRequest.onreadystatechange = function () {
        if (ajaxRequest.readyState == 4) {
            var ajaxDisplay = document.getElementById('ajaxDiv');
            ajaxDisplay.innerHTML = ajaxRequest.responseText;
        }
    }
    // Now get the value from user and pass it to
    // server script.
   
    var queryValues = "?runde=" + runde + 
        "&guthaben=" + Guthaben + 
        "&gesetzt=" + gesetzt + 
        "&gewinn_zahl=" + gewinn_zahl + 
        "&gewinn_farbe=" + gewinn_farbe + 
        "&gewinn_gerade=" + gewinn_gerade + 
        "&verloren=" + verloren+ 
        "&gewonnen=" + gewonnen+ 
        "&player_id=" + player_id;
    ajaxRequest.open("GET", "game_script.php" + queryValues, false);
    ajaxRequest.send(null);
    
    // Re-enable the play button
	$("#play").removeAttr("disabled");
}