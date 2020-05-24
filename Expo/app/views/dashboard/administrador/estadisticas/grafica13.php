<?php
require_once("../../../app/models/conexion.php");
require_once("../../../app/controllers/dashboard/administrador/estadisticas/consulta13.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Budget Document</title>
</head>

<body>
    <main class="hermoso text-white white-text">
        <div class="container">
            <div class="row">
                <div class="col s12 col l12 col m12 center">
                    <h1 class="text-center">Gráficos de departamento por grado</h1>
                    <div class="altura"></div>
                    <div style="width:60%">
                    <canvas id="Chart2" class="white center"></canvas>
                    <div class="altura"></div>
                    </div>
                        <!-- jQuery cdn -->
                    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
                    <!-- Chart.js cdn -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
                </div>
                
                <div class="altura"></div>
            </div>
        </div>
    </main>
</body>
</html><script>
 

//======================================================================================
//                         SECCION DE GRAFICO DE BARRAS
//======================================================================================
// chart DOM Element
var ctx = document.getElementById("Chart2");
      var data = {
        datasets: [{
          data: [<?php echo $expenses; ?>],
		  backgroundColor: ['#40E0D0',"#FF4500","#9B59B6", "#99FF99"],
		  borderColor: "#191970",
		  borderWidth: 5,
		  // Changes this dataset to become a line
          //type: 'line',
          label: "Municipio", // for legend
        }],
        labels: [
          <?php echo $dates; ?>
        ]
      };

      var xChart = new Chart(ctx, {
		 // The type of chart we want to create
        type: 'pie',
		 // The data for our dataset
        data: data,
		 // Configuration options go here
		options: {
        scales: {
            xAxes: [{
                stacked: true
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }
		  });
//======================================================================================
//                        FIN DE SECCION DE GRAFICO DE BARRAS
//======================================================================================
</script>