<?php
    $this->load->view('customer/includes/header.php');
?>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
	<div class="container">
		<div class="row default_row">
			<div class="full_width_box">
				<!--===============spacing==============-->
				<div class="pd_top_80"></div>
				<!--===============spacing==============-->

				<div class="text-center">
					<h4>Loan Details</h4>
					<div class="pd_bottom_40"></div>
				</div>

				<section class="wrapper py-100">
					<div class="container py-10 py-md-12">
						<div class="card card-border-start border-dark">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<?php
										switch ($appdetails->status) {
											case "5":
												echo '<div role="alert" class="alert alert-info"> Your application is reopen again for process. Please contact customer care for more details.</div>';
												break;

											case "4":
												echo '<div role="alert" class="alert alert-warning"> Your application is under query processing. Please contact customer care for more details.</div>';
												break;

											case "3":
												echo '<div role="alert" class="alert alert-danger"> Your application has been completely rejected. Please contact customer care for more details.</div>';
												break;

											case "2":
												echo '<div role="alert" class="alert alert-success"> Your application has been approved. Please contact customer care for more details.</div>';
												break;

											default:
												break;
										}
										?>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<p class="mb-0">Loan Date : <strong>
												<?php echo displayDate($appdetails->rec_date); ?>
											</strong></p>
										<hr />

										<p>Loan Type : <strong>
												<?php
												if ($appdetails->loantype == 11) {
													echo 'Personal Loan';
												} else if ($appdetails->loantype == 12) {
													echo 'Business Loan';
												}
												?>
											</strong></p>
										<hr />

										<p>Loan Amount : <strong>
												<?php echo formatePriceIndia($appdetails->loanamount); ?>
											</strong></p>
										<hr />

										<p>Loan Tenure : <strong>
												<?php echo $appdetails->loantenure; ?>
											</strong></p>
										<hr />

										<p>Loan Purpose : <strong>
												<?php echo $appdetails->loanpurpose; ?>
											</strong></p>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
										<p>CIBIL Score : <strong>
												<?php echo $appdetails->cibilscore; ?>
											</strong></p>
										<hr />

										<p>Income : <strong>
												<?php echo formatePriceIndia($appdetails->income); ?>
											</strong></p>
										<hr />

										<p>Current EMI : <strong>
												<?php echo $appdetails->currentemi; ?>
											</strong></p>
										<hr />

										<p>EMI Bounce : <strong>
												<?php
												if ($appdetails->emibounce == 0) {
													echo 'No';
												} else if ($appdetails->emibounce == 1) {
													echo 'Yes';
												} else {
													echo '-';
												} ?>
											</strong></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				<!--===============spacing==============-->
				<div class="pd_top_40"></div>
				<!--===============spacing==============-->

				<section class="wrapper py-100">
					<div class="container py-10 py-md-12">
						<div class="card card-border-start border-dark">
							<div class="card-body">
								<table id="myDatatable" class="table table-hover dt-responsive">
									<thead>
										<tr>
											<th scope="col"></th>
											<th scope="col">Status</th>
											<th scope="col">Date</th>
											<th scope="col">Bank</th>
											<th scope="col">Remarks</th>
											<th scope="col">Details</th>
										</tr>
									</thead>
									<tbody>
										<?php
										if (count($statuslist)) {
											foreach ($statuslist as $row) {
												echo "<tr class='table-" . $row->colorclass . "'>";
												echo "<td></td>";

												echo "<td><strong>" . htmlentities($row->statusname) . "</strong></td>";
												echo "<td>" . displayDate($row->statusdate) . ' ' . displayTime($row->rec_date) . "</td>";
												echo "<td>" . htmlentities($row->bank_name) . "</td>";
												echo "<td>" . htmlentities($row->remarks) . "</td>";

												echo "<td width='200'>";
												if ($row->loanamount > 0) {
													echo "Loan Amount - " . formatePriceIndia($row->loanamount);
												}

												if ($row->loanroi != "") {
													echo "<br/>ROI - " . htmlentities($row->loanroi);
												}

												if ($row->loanterms != "") {
													echo "<br/>Terms - " . htmlentities($row->loanterms);
												}

												if ($row->processfees > 0) {
													echo "<br/>Process Fees - " . htmlentities($row->processfees);
												}

												if ($row->insurance != "") {
													echo "<br/>Insurance - " . htmlentities($row->insurance);
												}

												if ($row->monthlyemi > 0) {
													echo "<br/>Monthly EMI - " . htmlentities($row->monthlyemi);
												}
												echo "</td>";
												echo "</tr>";
											}
										}
										?>			
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</section>

				<!--===============spacing==============-->
				<div class="pd_bottom_50"></div>
				<!--===============spacing==============-->
			</div>
		</div>
	</div>
</div>
<?php
    $this->load->view('customer/includes/footer.php');
?>
