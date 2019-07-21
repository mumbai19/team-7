function renderChart(data, labels, typeG) {
  var ctx = document.getElementById("class").getContext("2d");
  var myChart = new Chart(ctx, {
    type: typeG,
    data: {
      labels: labels,
      datasets: [
        {
          label: "All time",
          data: data,
          borderColor: "rgba(8, 71, 110, 1)",
          backgroundColor: "rgba(8, 71, 110, 0.6)"
        }
      ]
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true
              //
            }
          }
        ]
      }
    }
  });
}

function renderDoubleChart(data, data1, labels, typeG) {
  var ctx = document.getElementById("class").getContext("2d");
  var myChart = new Chart(ctx, {
    type: typeG,
    data: {
      labels: labels,
      datasets: [
        {
          label: "Last Month",
          data: data,
          borderColor: "rgba(255, 153, 153, 1)",
          backgroundColor: "rgba(255, 153, 153, 0.6)"
        },
        {
          label: "This Month",
          data: data1,
          borderColor: "rgba(8, 71, 110, 1)",
          backgroundColor: "rgba(8, 71, 110, 0.6)"
        }
      ]
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true
            }
          }
        ]
      }
    }
  });
}
function renderPieChart(data, labels, title) {
  var pie = document.getElementById("class").getContext("2d");
  var myChart = new Chart(pie, {
    type: "pie",
    data: {
      labels: labels,
      datasets: [
        {
          data: data,
          borderColor: ["rgba(75, 192, 192, 1)", "rgba(192, 0, 0, 1)"],
          backgroundColor: ["rgba(75, 192, 192, 0.2)", "rgba(192, 0, 0, 0.2)"]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: title
      }
    }
  });
}
