// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito, sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById("myPieChart");
    var productsByCategory = JSON.parse(ctx.getAttribute('data-categories'));

    var labels = [];
    var data = [];

    productsByCategory.forEach(function (category) {
        labels.push(category.category_name);
        data.push(category.products_count);
    });

    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });

    var legendContainer = document.getElementById('legend-container'); // Change 'legend-div' to the actual ID of your target div

    labels.forEach(function (label, index) {
        var legendItem = document.createElement('span');
        legendItem.classList.add('mr-2', 'mb-2'); // Add mb-2 for bottom margin

        var icon = document.createElement('i');
        icon.classList.add('fas', 'fa-circle');
        icon.style.color = myPieChart.data.datasets[0].backgroundColor[index];

        legendItem.appendChild(icon);

        var text = document.createTextNode(' ' + label);
        legendItem.appendChild(text);

        if (index === 1) {
            // Insert a line break after the second span
            legendItem.appendChild(document.createElement('br'));
        }

        legendContainer.appendChild(legendItem);
    });
});
