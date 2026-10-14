<?php
    include_once(APPPATH.'views/includes/header.php');
?>
<script type="text/javascript">
	window.onload = function () {
		document.getElementById("99").className += " active";
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
			<h2 class="text-bold-600 text-center">Digital Today's Statistics - <?php echo date('d M, Y'); ?></h2>
			<hr />
		</div>
	</div>

	<div class="row">
		<!-- Digital Loan -->
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('users/digitalleads?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['digitalloans'],0); ?></h3>
									<h6 class="text-bold-700">Digital Loan Enquiry</h6>
								</div>
								<div><i class="la la-server warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('users/digitalleads/pl?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['digitalpersonal'],0); ?></h3>
									<h6 class="text-bold-700">Digital Personal Loan Enquiry</h6>
								</div>
								<div><i class="la la-server warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('users/digitalleads/bl?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['digitalbusiness'],0); ?></h3>
									<h6 class="text-bold-700">Digital Business Loan Enquiry</h6>
								</div>
								<div><i class="la la-server warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Digital Loan -->


		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('users/referral?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['refferalcustomerpayout'],0); ?></h3>
									<h6 class="text-bold-700">Pending Customer Payout</h6>
								</div>
								<div><i class="la la-sitemap warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>



		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('loan/application?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['userapplication'],0); ?></h3>
									<h6 class="text-bold-700">Loan Applications</h6>
								</div>
								<div><i class="la la-list warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('loan/reapplyhistory?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['reapplyapplication'],0); ?></h3>
									<h6 class="text-bold-700">Loan Reapply Applications</h6>
								</div>
								<div><i class="la la-list warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('site/sentotps?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700"><?php echo number_format($statestics['otpmessage'],0); ?>
									</h3>
									<h6 class="text-bold-700">Today OTP</h6>
								</div>
								<div><i class="la la-asterisk warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<div class="row">
		<div class="col-12">
			<hr />
			<h2 class="text-bold-600 text-center">Digital Payment & Offers Statistics</h2>
			<hr />
		</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('users/membershiplist/11?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['standardcards'],0); ?></h3>
									<h6 class="text-bold-700">Standard Membership Cards - <?php echo PG_DIGITAL_PL; ?>
									</h6>
								</div>
								<div><i class="la la-credit-card warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('users/membershiplist/12?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700"><?php echo number_format($statestics['primecards'],0); ?>
									</h3>
									<h6 class="text-bold-700">Prime Membership Cards - <?php echo PG_DIGITAL_BL; ?></h6>
								</div>
								<div><i class="la la-credit-card warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('enquiry/cardoffer?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700"><?php echo number_format($statestics['cardoffer'],0); ?>
									</h3>
									<h6 class="text-bold-700">Card Offer Sales - <?php echo PG_CARD_OFFER; ?> </h6>
								</div>
								<div><i class="la la-hand-o-right warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('enquiry/specialoffer?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['specialoffer'],0); ?></h3>
									<h6 class="text-bold-700">Special Offer Sales - <?php echo PG_SPECIAL_OFFER; ?></h6>
								</div>
								<div><i class="la la-hand-o-right warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('enquiry/bumperoffer?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['bumperoffer'], 0); ?>
									</h3>
									<h6 class="text-bold-700">Bumper Offer Sales - <?php echo PG_BUMPER_OFFER; ?> </h6>
								</div>
								<div><i class="la la-hand-o-right warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('enquiry/flashoffer?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['flashoffer'], 0); ?>
									</h3>
									<h6 class="text-bold-700">Flash Offer Sales - <?php echo PG_FLASH_OFFER; ?> </h6>
								</div>
								<div><i class="la la-hand-o-right warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('enquiry/quickoffer?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['quickoffer'], 0); ?>
									</h3>
									<h6 class="text-bold-700">Quick Offer Sales - <?php echo PG_QUICK_OFFER; ?> </h6>
								</div>
								<div><i class="la la-hand-o-right warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('enquiry/megaoffer?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['megaoffer'], 0); ?>
									</h3>
									<h6 class="text-bold-700">Mega Offer Sales - <?php echo PG_MEGA_OFFER; ?> </h6>
								</div>
								<div><i class="la la-hand-o-right warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<hr />

			<h2 class="text-bold-600 text-center">Bharatfincash Today's Statistics - <?php echo date('d M, Y'); ?></h2>
			<hr />
		</div>
	</div>

	<div class="row">
		<!-- Bharatfincash Loan -->
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('subscriptionusers/bharatfincashleads?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['subscriptionloans'],0); ?></h3>
									<h6 class="text-bold-700">Bharatfincash Loan Enquiry</h6>
								</div>
								<div><i class="la la-server warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a
							href="<?php echo site_url('subscriptionusers/bharatfincashleads/pl?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['subscriptionpersonal'],0); ?></h3>
									<h6 class="text-bold-700">Bharatfincash Personal Loan Enquiry</h6>
								</div>
								<div><i class="la la-server warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a
							href="<?php echo site_url('subscriptionusers/bharatfincashleads/bl?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['subscriptionbusiness'],0); ?></h3>
									<h6 class="text-bold-700">Bharatfincash Business Loan Enquiry</h6>
								</div>
								<div><i class="la la-server warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Digital Loan -->


	</div>

	<div class="row">
		<div class="col-12">
			<hr />
			<h2 class="text-bold-600 text-center">Bharatfincash Payment & Offers Statistics</h2>
			<hr />
		</div>
	</div>

	<div class="row">
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('subscriptionusers/subscriptionlist/?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['bfccards'],0); ?></h3>
									<h6 class="text-bold-700">Bharatfincash Subscription - <?php echo PG_BHARATFINCASH; ?>
									</h6>
								</div>
								<div><i class="la la-credit-card warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('enquiry/staroffer?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700"><?php echo number_format($statestics['staroffer'],0); ?>
									</h3>
									<h6 class="text-bold-700">Star Offer Sales - <?php echo PG_STAR_OFFER; ?> </h6>
								</div>
								<div><i class="la la-hand-o-right warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('enquiry/primeoffer?dt_to='.date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['primeoffer'],0); ?></h3>
									<h6 class="text-bold-700">Prime Offer Sales - <?php echo PG_PRIME_OFFER; ?></h6>
								</div>
								<div><i class="la la-hand-o-right warning font-large-2 float-right"></i></div>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-4 col-lg-4 col-12">
			<div class="card pull-up border-warning">
				<div class="card-content">
					<div class="card-body">
						<a href="<?php echo site_url('enquiry/festivaloffer?dt_to=' . date('Y-m-d')); ?>">
							<div class="media d-flex">
								<div class="media-body text-left">
									<h3 class="text-bold-700">
										<?php echo number_format($statestics['festivaloffer'], 0); ?>
									</h3>
									<h6 class="text-bold-700">Festival Offer Sales - <?php echo PG_FESTIVAL_OFFER; ?> </h6>
								</div>
								<div><i class="la la-hand-o-right warning font-large-2 float-right"></i></div>
							</div>
						</a>
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
	setTimeout(function () {
		location.reload();
	}, 180000);

</script>
