       



 function RunChart(type,data,dataLabels){
  console.log("helo");
 //var dataLabels=['January', 'February', 'March', 'April', 'May', 'June', 'July'];
  //var data=[0, 10, 5, 2, 20, 30, 45];
  $("#chartContainer").empty();
  $("#chartContainer").append('<canvas id="myChart" ></canvas>');
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: type,

    // The data for our dataset
    data: {
        labels: dataLabels,
        datasets: [{
            label: 'StudentA',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: data,
        }]
    },

    // Configuration options go here
    options: {}
});
  chart.update();
}

function RunChartLine(type,data,dataLabels,number){
  console.log("inside",type,data,dataLabels,number);
  //var number=0;
 // var dataLabels=['January', 'February', 'March', 'April', 'May', 'June', 'July'];
 // var data=[[0, 10, 5, 2, 20, 30, 45],[ 2, 20, 30, 45,0, 10, 5]];          // line chart data
 $("#chartContainer2").empty();
$("#chartContainer2").append('<canvas id="myChart2" ></canvas>');
var ctx = document.getElementById('myChart2').getContext('2d');
/*        data: data[0],
        label: "",
        borderColor: "#3e95cd",
        fill: false
      };*/
var chart = new Chart(ctx, {
  type: type,
  data: {
    labels: dataLabels,
    datasets: [{ 
        data: data,
        label: "StudentA",
        borderColor: "#3e95cd",
        fill: false
      },/*{ 
        data: data[1],
        label: "",
        borderColor: "#3e95cd",
        fill: false
      }*/]
  },
  options: {
    title: {
      display: true,
      text: 'Analysis'
    }
  }
});


}
