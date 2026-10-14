<?php
    include_once(APPPATH.'views/includes/header.php');

    if($loantype == 'pl') {
        $loanid = 1;
        $loanname = 'Personal Loan';
    }
    else if($loantype == 'bl') {
        $loanid = 4;
        $loanname = 'Business Loan';
    }
    else {
        $loanid = 99;
        $loanname = 'All Loan';
    }
?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("125").className += " active";
      document.getElementById("125" + <?php echo $loanid; ?>).className += " active";
  }
</script>

	<div class="content-header row">
	  <div class="content-header-left col-md-12 col-12 mb-1">
	    <h1 class="content-header-title text-uppercase">Report - Offline Leads - <?php echo $loanname; ?></h1>
	  </div>
	</div>


	<div class="content-body">
      <section id="configuration">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-content collapse show">
                <div class="card-body">
                    <canvas id="column-chart" height="400"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">

              <div class="card-content collapse show">
                <div class="card-body">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th>Year</th>
                        <th>Month</th>
                        <th class='text-right'>Total Leads</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $grandtotal = 0;
                        $barlabel = $bardata = "";

                        if(count($datalist)) {
                        	foreach ($datalist as $row) {
                        	echo "<tr>";
                            echo "<td>".htmlentities($row->recyear)."</td>";
                        	echo "<td>".htmlentities($row->recmonth)."</td>";
                            echo "<td class='text-right'>".htmlentities(number_format($row->totaluser,0))."</td>";

                            $grandtotal += $row->totaluser;
                            $barlabel .= "'".$row->recyear." - ".$row->recmonth."',";
                            $bardata .= $row->totaluser.",";

                          	echo "</tr>";
                        	}
                        }
                      ?>
                    </tbody>
                    <tfoot>
                        <tr class='text-right text-bold-600'>
                          <td colspan="2">Total Leads</td>
                          <td><?php echo number_format($grandtotal,0); ?></td>
                        </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </section>
    </div>
    
<?php
    include_once(APPPATH.'views/includes/footer.php');
?>

<script type="text/javascript">
$(document).ready(function () {
    var ctx = $("#column-chart");

    var chartOptions = {
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
        legend: {
            position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
    };

    // Chart Data
    var chartData = {
        labels: [<?php echo $barlabel; ?>],
        datasets: [{
            label: "Total Leads",
            data: [<?php echo $bardata; ?>],
            backgroundColor: "#F9A825",
            hoverBackgroundColor: "#f6c980",
            borderColor: "transparent"
        }]
    };

    var config = {
        type: 'bar',
        options : chartOptions,
        data : chartData
    };

    var lineChart = new Chart(ctx, config);
});
</script>