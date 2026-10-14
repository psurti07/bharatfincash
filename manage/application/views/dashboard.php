<?php
    include_once(APPPATH.'views/includes/header.php');

	$barlabel1 = $bardata1 = $barlabel2 = $bardata2 = $barlabel3 = $bardata3 = $barlabel4 = $bardata4 = "";

	if (count($digitalcustlist)) {
		foreach ($digitalcustlist as $row) {
			$barlabel1 .= "'" . $row->recday . " - " . $row->recmonth . "',";
			$bardata1 .= $row->totaluser . ",";
		}
	}
	
	if (count($digitalleadlist)) {
		foreach ($digitalleadlist as $row) {
			$barlabel2 .= "'" . $row->recday . " - " . $row->recmonth . "',";
			$bardata2 .= $row->totaluser . ",";
		}
	}

	if (count($subscriptioncustlist)) {
		foreach ($subscriptioncustlist as $row) {
			$barlabel3 .= "'" . $row->recday . " - " . $row->recmonth . "',";
			$bardata3 .= $row->totaluser . ",";
		}
	}
	
	if (count($subscriptionleadlist)) {
		foreach ($subscriptionleadlist as $row) {
			$barlabel4 .= "'" . $row->recday . " - " . $row->recmonth . "',";
			$bardata4 .= $row->totaluser . ",";
		}
	}

?>
<script type="text/javascript">   
  window.onload = function(){
      document.getElementById("101").className += " active";
  }
</script>

  <div class="content-body">
	<div class="row">
		<div class="col-12">
			<?php
				if (!empty($ac_data)) {
				?>
				<div class="alert alert-<?php echo $ac_data['ac_class'] ?> fade show" role="alert">
					<h4><?php echo $ac_data['ac_title'] ?></h4>
					<p><?php echo $ac_data['ac_msg'] ?></p>
				</div>
				<?php
				}
			?>
	      <h2 class="text-bold-600 text-center">Digital Today's Statistics - <?php echo date('d M, Y'); ?></h2><hr/>
	  	</div>
	</div>

	<div class="row">
		<!-- Digital Loan -->
		<div class="col-12 col-md-6">
				<div class="card">
					<div class="card-content collapse show">
						<h2 class="text-center pt-1">Digital Customer Registrations</h2>
						<div class="card-body">
							<canvas id="column-chart-digital-customer" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6">
				<div class="card">
					<div class="card-content collapse show">
						<h2 class="text-center pt-1">Digital Customer Leads</h2>
						<div class="card-body">
							<canvas id="column-chart-digital-leads" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>

    </div>

	<div class="row pt-3">
		<div class="col-12">
	      <h2 class="text-bold-600 text-center">Subscription Today's Statistics - <?php echo date('d M, Y'); ?></h2><hr/>
	  	</div>
	</div>

	<div class="row">
		<!-- Subscription Loan -->
		<div class="col-12 col-md-6">
				<div class="card">
					<div class="card-content collapse show">
						<h2 class="text-center pt-1">Subscription Customer Registrations</h2>
						<div class="card-body">
							<canvas id="column-chart-subscription-customer" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>

			<div class="col-12 col-md-6">
				<div class="card">
					<div class="card-content collapse show">
						<h2 class="text-center pt-1">Subscription Customer Leads</h2>
						<div class="card-body">
							<canvas id="column-chart-subscription-leads" height="300"></canvas>
						</div>
					</div>
				</div>
			</div>

    </div>

  </div>
    
<?php
    include_once(APPPATH.'views/includes/footer.php');
?>
<script type="text/javascript">
	$(document).ready(function () {
		var digitalcustomer = $("#column-chart-digital-customer");
		var digitalleads = $("#column-chart-digital-leads");
		var subscriptioncustomer = $("#column-chart-subscription-customer");
		var subscriptionleads = $("#column-chart-subscription-leads");

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
			responsiveAnimationDuration: 500,
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

		// Chart Data Customer
		var chartData1 = {
			labels: [<?php echo $barlabel1; ?>],
			datasets: [{
				label: "Registrations",
				data: [<?php echo $bardata1; ?>],
				backgroundColor: "#15360e",
				hoverBackgroundColor: "#423e3a",
				borderColor: "transparent"
			}]
		};

		var config1 = {
			type: 'bar',
			options: chartOptions,
			data: chartData1
		};

		var lineChart = new Chart(digitalcustomer, config1);

		// Chart Data Leads
		var chartData2 = {
			labels: [<?php echo $barlabel2; ?>],
			datasets: [{
				label: "Leads",
				data: [<?php echo $bardata2; ?>],
				backgroundColor: "#15360e",
				hoverBackgroundColor: "#423e3a",
				borderColor: "transparent"
			}]
		};

		var config2 = {
			type: 'bar',
			options: chartOptions,
			data: chartData2
		};

		var lineChart = new Chart(digitalleads, config2);

		// Chart Data Customer
		var chartData3 = {
			labels: [<?php echo $barlabel3; ?>],
			datasets: [{
				label: "Registrations",
				data: [<?php echo $bardata3; ?>],
				backgroundColor: "#15360e",
				hoverBackgroundColor: "#423e3a",
				borderColor: "transparent"
			}]
		};

		var config3 = {
			type: 'bar',
			options: chartOptions,
			data: chartData3
		};

		var lineChart = new Chart(subscriptioncustomer, config3);

		// Chart Data Leads
		var chartData4 = {
			labels: [<?php echo $barlabel4; ?>],
			datasets: [{
				label: "Leads",
				data: [<?php echo $bardata4; ?>],
				backgroundColor: "#15360e",
				hoverBackgroundColor: "#423e3a",
				borderColor: "transparent"
			}]
		};

		var config4 = {
			type: 'bar',
			options: chartOptions,
			data: chartData4
		};

		var lineChart = new Chart(subscriptionleads, config4);

		
		

	});
</script>

<script type="text/javascript">
setTimeout(function() {
    location.reload();
}, 180000);
</script>
