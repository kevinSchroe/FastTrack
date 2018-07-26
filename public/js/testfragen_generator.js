/* Testfragen Generator und Evaluierer
 * Dieses Script interagiert mit der jeweiligien testfragenseite und ist universell einsetzbar
 */

//Globale Variablen
var category = "";
var questions = []; // Array mit allen Fragen
var currentQuestion = 0;
var currentCorrectAnswer = ""; //Hier wird immer die aktuell richtige Antwort gespeichert
var correctAnswers = 0; //Anzahl der Richtigen Antworten
var wrongQuestions = [];

//Funktion zum mixen des Arrays
function shuffle(a) {
    var j, x, i;
    for (i = a.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        x = a[i];
        a[i] = a[j];
        a[j] = x;
    }
    return a;
}

function evaluateQuestion() {

    var selectedAnswer = $('input[type=radio]:checked').data('content');
    if (selectedAnswer.trim().toLowerCase() === currentCorrectAnswer.trim().toLowerCase()) { // damit die Antworten eingabe sicher sind werden Leerzeichen abgeschnitten(trim) und alle buchstaben in kleinbuchstaben gespeichert(toLowerCase)
        correctAnswers++;
    } else {
        wrongQuestions.push(questions[currentQuestion])
    }
    currentQuestion++; //Nächste Frage
    nextQuestion();
}


function getTemplate(frage) {
    currentCorrectAnswer = frage['richtig'];
    antworten = frage['antworten'].split(','); //Antworten zu einem Array splitten
    shuffle(antworten);    //Antworten mixen
    return '<div class="container flex flex-column">' +
        '<div class="title"><h4>' + frage['frage'] + ' ( ' + (currentQuestion + 1) + ' / ' + questions.length + ' )' + '</h4></div>' +
        '<div class="radio">\n' +
        '  <label><input type="radio" name="answer" data-content="' + antworten[0] + '" checked>  ' + antworten[0] + '</label>\n' +
        '</div>\n' +
        '<div class="radio">\n' +
        '  <label><input type="radio" name="answer" data-content="' + antworten[1] + '">  ' + antworten[1] + '</label>\n' +
        '</div>\n' +
        '<div class="radio">\n' +
        '  <label><input type="radio" name="answer" data-content="' + antworten[2] + '">  ' + antworten[2] + '</label>\n' +
        '</div>' +
        '<button class="btn btn-primary" type="button" id="next" onclick="evaluateQuestion()" style="width: 20%;margin-left: auto"> Weiter </button>' +
        '</div>';
}


function generateQuestions(fragen, kategorie) {
    category = kategorie;
    questions = fragen;
    nextQuestion();
}

function nextQuestion() {
    //Am Ende des Katalogs angekommen
    if (currentQuestion === questions.length) { //Alle Fragen sind hier Beantwortet Falsche Fragen werden nochmal aufgegriffen.
        //console.log('ende');
        var preparedHtml = '<div class="container flex-column" style="display: flex">' +
            '<span style="font-size: 1.8em">Du hast <b>' + correctAnswers + '</b> Fragen von <b>' + questions.length + '</b> richtig beantwortet!</span>';
        if (wrongQuestions.length > 0) { //Falls Fragen falsch beantwortet wurden, wird hier eine entspechende Tabelle generiert
            preparedHtml += '<div class="container"><br>' +
                '<h4>Folgende Fragen haben dir Probleme bereitet:</h4>' +
                '<br><br>' +
                '<table class="table">' +
                '   <thead>' +
                '       <th>Frage</th>' +
                '       <th>Korrekte Antwort</th>' +
                '   </thead>' +
                '   <tbody>'
            for (var i = 0; i < wrongQuestions.length; i++) {
                preparedHtml +=
                    '<tr>' +
                    '<td>' + wrongQuestions[i].frage + '</td>' +
                    '<td>' + wrongQuestions[i].richtig + '</td>' +
                    '</tr>'
            }
            preparedHtml +=
                '</tbody>' +
                '</table>'
        }
        preparedHtml +=
            '<button class="btn btn-primary" type="button" onclick="postToDash()" id="dash" style="width: 10em;margin: 2em auto auto auto"> Zum Dashboard </button>' +
            '</div>';
        //Noch den vorbereiteten HTML Code in den container laden
        $('#cardBody').html(preparedHtml);
        return;
    } else {
        $('#cardBody').html(getTemplate(questions[currentQuestion])); //Nächste Frage wählen für den nächsten Methodenaufruf
    }
}

function postToDash() {
    var csrf_token = $('meta[name="csrf-token"]').attr('content'); //Den CSRF-Token abrufen um ihn mit zu übermitteln
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': csrf_token
        }
    });
    $.ajax(
        {
            url: '../dashboard',
            method: 'POST',
            data: 'kategorie=' + category + '&antworten=' + questions.length + '&richtig=' + correctAnswers,
            success: function () {
                window.location = '../dashboard'
            }
        }
    );
}

