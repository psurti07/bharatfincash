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
					<h4>My Customers</h4>
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
											<th scope="col">Registration</th>
											<th scope="col">Name</th>
											<th scope="col">Mobile</th>
											<th scope="col">Email Id</th>
											<th scope="col">City</th>
											<th scope="col">Pay</th>
											<th scope="col">Pay Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$cnt = 1;
										foreach ($refuserlist as $row) {
											echo "<tr>";
											echo "<td>" . $cnt . "</td>";
											echo "<td>" . displayDate($row->rec_date) . "</td>";
											echo "<td class='text-capitalize'>" . htmlentities($row->fullname) . "</td>";
											echo "<td>" . htmlentities($row->mobile) . "</td>";
											echo "<td>" . htmlentities($row->email) . "</td>";
											echo "<td>" . htmlentities($row->city) . "</td>";

											if ($row->payout == 1) {
												echo "<td class='text-success'>Approved</td>";
											} else if ($row->payout == 2) {
												echo "<td class='text-danger'>Rejected</td>";
											} else {
												echo "<td class='text-dark'>Pending</td>";
											}

											echo "<td>";
											if ($row->payout_date != NULL) {
												echo displayDate($row->payout_date);
											}
											echo "</td>";

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
