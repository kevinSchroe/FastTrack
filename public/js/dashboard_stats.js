/*Das hier ist das lade script
  für die statistiken vom dashboard*/


//Glabale Variablen
var gData;


// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages': ['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawBarChart);
google.charts.setOnLoadCallback(drawPieChart);

function getData(data) {
    gData = data;
}


function drawBarChart() {
    var daten = gData;
    //Hier werden die Daten eingelesen:
    var data = [];
    data.push(['Kategorie', 'Richtig', 'Falsch', {role: 'annotation'}]);
    for (let i = 0; i < daten.length; i++) {
        var item = daten[i];
        //Hier findet die eigentliche Umrechnung in Prozentzahlen statt
        data.push([capitalizeFirstLetter(item.kategorie), item.anzahl_richtig / item.anzahl_antworten * 100, 100 - (item.anzahl_richtig / item.anzahl_antworten * 100), '']);
    }

    var dataTable = google.visualization.arrayToDataTable(data);

    var options_fullStacked = {
        isStacked: 'percent',
        height: 300,
        legend: {position: 'top', maxLines: 3},
        //Hier die Farben verändern damit wir Grün und Rot nutzen können
        series: {
            0: {color: '#388E3C'},
            1: {color: '#FF5252'}
        },
        hAxis: {
            minValue: 0,
            ticks: [0, .3, .6, .9, 1]
        }
    };
    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.BarChart(document.getElementById('bar-chart-div'));
    chart.draw(dataTable, options_fullStacked);
}

function drawPieChart() {

    var daten = gData;

    var data = []
    data.push(['Kategorie', 'Absolvierte Test']);

    for (let i = 0; i < daten.length; i++) {
        var item = daten[i];
        data.push([capitalizeFirstLetter(item.kategorie), item.anzahl_test]);
    }

    var dataTable = google.visualization.arrayToDataTable(data);

    var options = {
        title: 'Bereits absolvierte Tests'
    };

    var chart = new google.visualization.PieChart(document.getElementById('pie-chart-div'));

    chart.draw(dataTable, options);
}

//Helper Funktionen
function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}