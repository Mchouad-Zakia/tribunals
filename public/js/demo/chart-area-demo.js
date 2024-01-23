// Chart Area Demo
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
    // ... (votre fonction number_format actuelle)
}

// Liste des mois de l'année
var moisDeLAnnee = [
    'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
    'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
];

// Récupérez les données du backend
var demandesParMois = demandesParMois; // Assurez-vous d'avoir ces données correctement

var moisAgrégés = [];
demandesParMois.forEach(demande => {
    var moisExist = moisAgrégés.find(mois => mois.mois === demande.mois);
    if (moisExist) {
        moisExist.nombre_demandes += demande.nombre_demandes;
    } else {
        moisAgrégés.push({ mois: demande.mois, nombre_demandes: demande.nombre_demandes });
    }
});

// Obtenez le contexte du graphique
var ctx = document.getElementById("myAreaChart").getContext('2d');

// Définissez la locale française pour Moment.js
moment.locale('fr');


var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: moisAgrégés.map(mois => moment(mois.mois, 'M').format('MMMM')),
        datasets: [{
            label: "Demandes",
            borderColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointHoverRadius: 3,
            borderWidth: 2,
            fill: false,
            data: moisAgrégés.map(mois => mois.nombre_demandes || 0),
        }],
    },
    options: {
        maintainAspectRatio: false,
        layout: {
            padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
            }
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false,
                    drawBorder: false
                },
                ticks: {
                    maxRotation: 0,
                    minRotation: 0,
                    autoSkip: true,
                    maxTicksLimit: 10
                },
            }],
            yAxes: [{
                ticks: {
                    stepSize: 1,
                    beginAtZero: true,
                    callback: function(value) {
                        return value;
                    }
                },
                gridLines: {
                    color: "rgb(234, 236, 244)",
                    zeroLineColor: "rgb(234, 236, 244)",
                    drawBorder: false,
                    borderDash: [2],
                    zeroLineBorderDash: [2]
                }
            }],
        },
        legend: {
            display: false
        },
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
                label: function(tooltipItem, chart) {
                    return 'Demandes: ' + tooltipItem.yLabel;
                }
            }
        }
    }
});
