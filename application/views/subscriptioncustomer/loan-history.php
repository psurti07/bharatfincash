<?php
    $this->load->view('subscriptioncustomer/includes/header.php');
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
					<h4>Loan History</h4>
					<div class="pd_bottom_40"></div>
				</div>

				<section class="wrapper py-100">
					<div class="container py-10 py-md-12">
						<div class="card card-border-start border-dark">
							<div class="card-body">
								<table id="myDatatable" class="table table-hover dt-responsive">
									<thead>
									<tr>
										<th>#</th>
										<th>Date</th>
										<th>Loan Type</th>
										<th>Amount</th>
										<th>CIBIL Score</th>
										<th>Loan Purpose</th>
										<th>Tenure</th>
										<th>Details</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$cnt = 1;
										foreach($loanhistory as $row) {
											echo "<tr>";
											echo "<td>".$cnt."</td>";
											echo "<td>".displayDate($row->rec_date)."</td>";

											if($row->loantype == 21) {
												echo "<td>Personal Loan</td>";
											}
											else if($row->loantype == 22) {
												echo "<td>Business Loan</td>";
											}
											else {
												echo "<td>-</td>";
											}
											
											echo "<td>".formatePriceIndia($row->loanamount)."</td>";
											echo "<td>".htmlentities($row->cibilscore)."</td>";
											echo "<td>".htmlentities($row->loanpurpose)."</td>";
											echo "<td>".htmlentities($row->loantenure)."</td>";
											$enc_id = '';
											$enc_id = stringCrypt($row->id, 'encrypt');
											echo "<td class='text-center' width='50'>".anchor("subscriptioncustomer/loan/appdetails/{$enc_id}",'<i class="icon-right-arrow-long"></i>','class="read_more"')."</td>";
											echo "</tr>";
											$cnt++;
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
    $this->load->view('subscriptioncustomer/includes/footer.php');
?>
