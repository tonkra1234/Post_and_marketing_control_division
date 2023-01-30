<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
  integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
  crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js">
</script>

<script>
  Chart.register(ChartDataLabels);

  // Self inspection bar
  const Bar_self = document.getElementById('Self_inspection');
  var SelfInspectionDzongkhag = <?php echo json_encode($results_self_inspection[0]); ?>;
  var SelfInspectionData = <?php echo json_encode($results_self_inspection[1]); ?>;

  // GMP inspection
  const Bar_gmp = document.getElementById('GMP_inspection');
  var GmpInspectionInspector = <?php echo json_encode($result_gmp[0]); ?>;
  var GmpInspectionData = <?php echo json_encode($result_gmp[1]); ?>;

  new Chart(Bar_self, {
    type: 'bar',
    data: {
      labels: SelfInspectionDzongkhag,
      datasets: [{
        label: 'Number of self inspection each Dzongkhag',
        data: SelfInspectionData,
        backgroundColor: [
                'rgb(230, 25, 75)',
                'rgb(60, 180, 75)',
                'rgb(255, 225, 25)',
                'rgb(0, 130, 200)',
                'rgb(245, 130, 48)',
                'rgb(145, 30, 180)',
                'rgb(70, 240, 240)',
                'rgb(240, 50, 230)',
                'rgb(210, 245, 60)',
                'rgb(250, 190, 212)',
                'rgb(0, 128, 128)',
                'rgb(220, 190, 255)',
                'rgb(170, 110, 40)',
                'rgb(255, 250, 200)',
                'rgb(128, 0, 0)',
                'rgb(170, 255, 195)',
                'rgb(255, 215, 180)',
                'rgb(0, 0, 128)',
                'rgb(128, 128, 128)',
                'rgb(107,35,143)',
                'rgb(204,204,204)',
                'rgb(143,106,35)'
        ],
        borderWidth: 1,
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          title: {
            text: 'No. self inspection',
            display: true,
            font: {
              size: 12,
              weight: "bold"
            }
          },
          
        },
        x: {
          beginAtZero: true,
          title: {
            text: 'Dzongkhag',
            display: true,
            font: {
              size: 16,
              weight: "bold"
            }
          }
        }
      },
      plugins: {
        datalabels: { // This code is used to display data values
          color: 'black',
          font: {
            weight: 'bold',
            size: 16
          }
        }
      }
    }
  });

  new Chart(Bar_gmp, {
    type: 'bar',
    data: {
      labels: GmpInspectionInspector,
      datasets: [{
        label: 'Number of GMP inspection each Inspector',
        data: GmpInspectionData,
        backgroundColor: [
                'rgb(230, 25, 75)',
                'rgb(60, 180, 75)',
                'rgb(255, 225, 25)',
                'rgb(0, 130, 200)',
                'rgb(245, 130, 48)',
                'rgb(145, 30, 180)',
                'rgb(70, 240, 240)',
                'rgb(240, 50, 230)',
                'rgb(210, 245, 60)',
                'rgb(250, 190, 212)',
                'rgb(0, 128, 128)',
                'rgb(220, 190, 255)',
                'rgb(170, 110, 40)',
                'rgb(255, 250, 200)',
                'rgb(128, 0, 0)',
                'rgb(170, 255, 195)',
                'rgb(255, 215, 180)',
                'rgb(0, 0, 128)',
                'rgb(128, 128, 128)',
                'rgb(107,35,143)',
                'rgb(204,204,204)',
                'rgb(143,106,35)'
        ],
        borderWidth: 1,
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          title: {
            text: 'No. gmp inspection',
            display: true,
            font: {
              size: 12,
              weight: "bold"
            }
          },
          
        },
        x: {
          beginAtZero: true,
          title: {
            text: 'Inspector',
            display: true,
            font: {
              size: 16,
              weight: "bold"
            }
          }
        }
      },
      plugins: {
        datalabels: { // This code is used to display data values
          anchor: 'end',
          align: 'top',
          color: 'black',
          font: {
            weight: 'bold',
            size: 16
          }
        }
      }
    }
  });
</script>