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
					<h4>My Customers Loan History</h4>
					<div class="pd_bottom_40"></div>
				</div>

				<section class="wrapper py-100">
					<div class="container py-10 py-md-12">
						<div class="card card-border-start border-dark">
							<div class="card-body">
								<table id="myDatatable" class="table table-hover dt-responsive">
									<thead>
										<tr>
											<th scope="col">#</th>
											<th scope="col">Date</th>
											<th scope="col">Name</th>
											<th scope="col">Loan Type</th>
											<th scope="col">Loan Amount</th>
											<th scope="col">Loan tenure</th>
											<th scope="col">Loan Purpose</th>
											<th scope="col">Status</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$cnt = 1;
										foreach ($loanhistory as $row) {
											echo "<tr>";
											echo "<td>" . $cnt . "</td>";
											echo "<td>" . displayDate($row->rec_date) . "</td>";
											echo "<td class='text-capitalize'>" . htmlentities($row->fullname) . "</td>";

											if ($row->loantype == 11) {
												echo "<td>Personal Loan</td>";
											} else if ($row->loantype == 12) {
												echo "<td>Business Loan</td>";
											} else {
												echo "<td>-</td>";
											}

											echo "<td>" . formatePriceIndia($row->loanamount) . "</td>";
											echo "<td>" . htmlentities($row->loantenure) . "</td>";
											echo "<td>" . htmlentities($row->loanpurpose) . "</td>";

											if ($row->status == 1) {
												echo "<td class='text-warning'>New</td>";
											} else if ($row->status == 2) {
												echo "<td class='text-success'>Approve</td>";
											} else if ($row->status == 3) {
												echo "<td class='text-danger'>Rejected</td>";
											} else {
												echo "<td>-</td>";
											}
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
    $this->load->view('customer/includes/footer.php');
?>
