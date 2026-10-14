<div class="main-menu menu-fixed menu-light menu-accordion" data-scroll-to-active="true">
	<div class="main-menu-content">
		<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
			<?php
			$role = $this->session->userdata['admintype'];
			if ($role == 0 || $role == 1) {
			?>
			<li id="101" class="nav-item">
				<a href="<?php echo site_url('dashboard'); ?>"><i class="la la-dashboard"></i><span
						class="menu-title">Dashboard</span></a>
			</li>

			<li id="99" class="nav-item">
				<a href="<?php echo site_url('dashboard/todaystatisctics'); ?>"><i class="la la-list-ol"></i><span
						class="menu-title">Today Statistics</span></a>
			</li>

			<li id="141" class=" nav-item"><a href="#"><i class="la la-list-ol"></i><span class="menu-title">Process
						Steps</span></a>
				<ul class="menu-content">
					<li id="1411"><a class="menu-item"
							href="<?php echo site_url('dashboard/processstepdatadigital'); ?>">Digital Users</a></li>
					<li id="1412"><a class="menu-item"
							href="<?php echo site_url('dashboard/processstepdatasubscription'); ?>">Subscription
							Users</a></li>
				</ul>
			</li>

			<li id="161" class=" nav-item"><a href="#"><i class="la la-list-ol"></i><span class="menu-title">Remarketing
						User</span></a>
				<ul class="menu-content">
					<li id="1611"><a class="menu-item"
							href="<?php echo site_url('dashboard/remarketingstatistics'); ?>">Digital Remarketing
							Users</a></li>
					<li id="1612"><a class="menu-item"
							href="<?php echo site_url('dashboard/remarketingstatisticsplan'); ?>">Sub. Remarketing
							Users</a></li>
				</ul>
			</li>

			<li id="151">
				<a class="menu-item" href="<?php echo site_url('dashboard/applicationstatistics'); ?>"><i
						class="la la-list"></i><span class="menu-title">Application</span></a>
			</li>
			<li id="999" class="nav-item">
				<a href="<?php echo site_url('site/search'); ?>"><i class="la la-search"></i><span
						class="menu-title">Search Data</span></a>
			</li>

			<li class=" navigation-header"><span>ALL LEADS</span></li>

			<li id="108" class=" nav-item"><a href="#"><i class="la la-server"></i><span class="menu-title">Digital Loan
						Enquiry</span></a>
				<ul class="menu-content">
					<li id="1081pl"><a class="menu-item"
							href="<?php echo site_url('users/digitalleads/pl'); ?>">Personal Loan</a></li>
					<li id="1081bl"><a class="menu-item"
							href="<?php echo site_url('users/digitalleads/bl'); ?>">Business Loan</a></li>
				</ul>
			</li>

			<li id="114" class=" nav-item"><a href="#"><i class="la la-star"></i><span class="menu-title">Premium
						Leads</span></a>
				<ul class="menu-content">
					<li id="1141pl"><a class="menu-item"
							href="<?php echo site_url('users/premiumleads/pl'); ?>">Personal Loan</a></li>
					<li id="1141bl"><a class="menu-item"
							href="<?php echo site_url('users/premiumleads/bl'); ?>">Business Loan</a></li>
				</ul>
			</li>

			<li id="151" class=" nav-item"><a href="#"><i class="la la-server"></i><span class="menu-title">Subscription
						Enquiry</span></a>
				<ul class="menu-content">
					<li id="1511pl"><a class="menu-item"
							href="<?php echo site_url('subscriptionusers/bharatfincashleads/pl'); ?>">Personal Loan</a>
					</li>
					<li id="1511bl"><a class="menu-item"
							href="<?php echo site_url('subscriptionusers/bharatfincashleads/bl'); ?>">Business Loan</a>
					</li>
				</ul>
			</li>

			<li id="152" class=" nav-item"><a href="#"><i class="la la-star"></i><span class="menu-title">Sub. Premium
						Leads</span></a>
				<ul class="menu-content">
					<li id="1521pl"><a class="menu-item"
							href="<?php echo site_url('subscriptionusers/premiumleads/pl'); ?>">Personal Loan</a></li>
					<li id="1521bl"><a class="menu-item"
							href="<?php echo site_url('subscriptionusers/premiumleads/bl'); ?>">Business Loan</a></li>
				</ul>
			</li>

			<li class=" navigation-header"><span>ACCOUNTS</span></li>

			<li id="107" class=" nav-item"><a href="#"><i class="la la-users"></i><span
						class="menu-title">Customers</span></a>
				<ul class="menu-content">
					<li id="1070"><a class="menu-item" href="<?php echo site_url('users'); ?>">Customer List</a></li>
					<li id="1071"><a class="menu-item" href="<?php echo site_url('users/addForm'); ?>">Create an
							Account</a></li>
				</ul>
			</li>

			<li id="153" class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title">Subscription
						Customers</span></a>
				<ul class="menu-content">
					<li id="1530"><a class="menu-item" href="<?php echo site_url('subscriptionusers'); ?>">Customer
							List</a></li>
					<li id="1531"><a class="menu-item"
							href="<?php echo site_url('subscriptionusers/addForm'); ?>">Create an Account</a></li>
				</ul>
			</li>

			<li id="119" class="nav-item">
				<a href="<?php echo site_url('enquiry/cardoffer'); ?>"><i class="la la-hand-o-right"></i><span
						class="menu-title">Card Offer Sales</span></a>
			</li>

			<li id="129" class="nav-item">
				<a href="<?php echo site_url('enquiry/specialoffer'); ?>"><i class="la la-hand-o-right"></i><span
						class="menu-title">Special Offer Sales</span></a>
			</li>

			<li id="132" class="nav-item">
				<a href="<?php echo site_url('enquiry/bumperoffer'); ?>"><i class="la la-hand-o-right"></i><span
						class="menu-title">Bumper Offer Sales</span></a>
			</li>

			<li id="133" class="nav-item">
				<a href="<?php echo site_url('enquiry/flashoffer'); ?>"><i class="la la-hand-o-right"></i><span
						class="menu-title">Flash Offer Sales</span></a>
			</li>
			<li id="134" class="nav-item">
				<a href="<?php echo site_url('enquiry/quickoffer'); ?>"><i class="la la-hand-o-right"></i><span
						class="menu-title">Quick Offer Sales</span></a>
			</li>
			<li id="135" class="nav-item">
				<a href="<?php echo site_url('enquiry/megaoffer'); ?>"><i class="la la-hand-o-right"></i><span
						class="menu-title">Mega Offer Sales</span></a>
			</li>

			<li id="136" class="nav-item">
				<a href="<?php echo site_url('enquiry/staroffer'); ?>"><i class="la la-hand-o-right"></i><span
						class="menu-title">Star Offer Sales</span></a>
			</li>

			<li id="137" class="nav-item">
				<a href="<?php echo site_url('enquiry/primeoffer'); ?>"><i class="la la-hand-o-right"></i><span
						class="menu-title">Prime Offer Sales</span></a>
			</li>

			<li id="138" class="nav-item">
				<a href="<?php echo site_url('enquiry/festivaloffer'); ?>"><i class="la la-hand-o-right"></i><span
						class="menu-title">Festival Offer Sales</span></a>
			</li> 

			<li class=" navigation-header"><span>LOAN APPLICATION</span></li>

			<li id="1101" class="nav-item">
				<a href="<?php echo site_url('loan/application'); ?>"><i class="la la-list"></i><span
						class="menu-title">New Application</span></a>
			</li>
			<li id="1104" class="nav-item">
				<a href="<?php echo site_url('loan/reapplyhistory'); ?>"><i class="la la-list"></i><span
						class="menu-title">Reapply Application</span></a>
			</li>
			<li id="1102" class="nav-item">
				<a href="<?php echo site_url('loan/approvehistory'); ?>"><i class="la la-list"></i><span
						class="menu-title">Approve Application</span></a>
			</li>
			<li id="1105" class="nav-item">
				<a href="<?php echo site_url('loan/queryprocesshistory'); ?>"><i class="la la-list"></i><span
						class="menu-title">Query Process</span></a>
			</li>

			<li id="1103" class="nav-item">
				<a href="<?php echo site_url('loan/rejecthistory'); ?>"><i class="la la-list"></i><span
						class="menu-title">Rejected Application</span></a>
			</li>

			<li class=" navigation-header"><span>SUBSCRIPTION APPLICATION</span></li>

			<li id="1201" class="nav-item">
				<a href="<?php echo site_url('subscriptionloan/application'); ?>"><i class="la la-list"></i><span
						class="menu-title">New Application</span></a>
			</li>
			<li id="1204" class="nav-item">
				<a href="<?php echo site_url('subscriptionloan/reapplyhistory'); ?>"><i class="la la-list"></i><span
						class="menu-title">Reapply Application</span></a>
			</li>
			<li id="1202" class="nav-item">
				<a href="<?php echo site_url('subscriptionloan/approvehistory'); ?>"><i class="la la-list"></i><span
						class="menu-title">Approve Application</span></a>
			</li>
			<li id="1205" class="nav-item">
				<a href="<?php echo site_url('subscriptionloan/queryprocesshistory'); ?>"><i
						class="la la-list"></i><span class="menu-title">Query Process</span></a>
			</li>
			<li id="1203" class="nav-item">
				<a href="<?php echo site_url('subscriptionloan/rejecthistory'); ?>"><i class="la la-list"></i><span
						class="menu-title">Rejected Application</span></a>
			</li>

			<li class=" navigation-header"><span>ORDERS</span></li>

			<li id="109" class=" nav-item"><a href="#"><i class="la la-credit-card"></i><span
						class="menu-title">Plan</span></a>
				<ul class="menu-content">
					<li id="10911"><a class="menu-item"
							href="<?php echo site_url('users/membershiplist/11'); ?>">Standard Plan</a></li>
					<li id="10912"><a class="menu-item" href="<?php echo site_url('users/membershiplist/12'); ?>">Prime
							Plan</a></li>
				</ul>
			</li>

			<li id="154" class="nav-item"><a href="#"><i class="la la-credit-card"></i><span
						class="menu-title">Subscriptions</span></a>
				<ul class="menu-content">
					<li id="15421"><a class="menu-item"
							href="<?php echo site_url('subscriptionusers/subscriptionlist/21'); ?>">Personal
							Subscriptions</a></li>
					<li id="15422"><a class="menu-item"
							href="<?php echo site_url('subscriptionusers/subscriptionlist/22'); ?>">Busniess
							Subscriptions</a></li>
				</ul>
			</li>

			<li id="112" class="nav-item"><a href="#"><i class="la la-sitemap"></i><span class="menu-title">Referral
						Payout</span></a>
				<ul class="menu-content">
					<li id="1121"><a class="menu-item" href="<?php echo site_url('users/referral'); ?>">Digital
							Users</a></li>
					<li id="1122"><a class="menu-item"
							href="<?php echo site_url('subscriptionusers/referral'); ?>">Subscription Users</a></li>
				</ul>
			</li>

			<li class=" navigation-header"><span>REPORTS</span></li>

			<li id="124" class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title">Digital
						Leads</span></a>
				<ul class="menu-content">
					<li id="12499"><a class="menu-item" href="<?php echo site_url('report/digitalleads'); ?>">All
							Leads</a></li>
					<li id="12411"><a class="menu-item"
							href="<?php echo site_url('report/digitalleads/pl'); ?>">Personal Loan</a></li>
					<li id="12412"><a class="menu-item"
							href="<?php echo site_url('report/digitalleads/bl'); ?>">Business Loan</a></li>
				</ul>
			</li>

			<li id="155" class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span
						class="menu-title">Subscription Leads</span></a>
				<ul class="menu-content">
					<li id="15599"><a class="menu-item" href="<?php echo site_url('report/subscriptionleads'); ?>">All
							Leads</a></li>
					<li id="15521"><a class="menu-item"
							href="<?php echo site_url('report/subscriptionleads/pl'); ?>">Personal Loan</a></li>
					<li id="15522"><a class="menu-item"
							href="<?php echo site_url('report/subscriptionleads/bl'); ?>">Business Loan</a></li>
				</ul>
			</li>

			<li id="122" class=" nav-item"><a href="#"><i class="la la-bar-chart"></i><span class="menu-title">Customers
						Reg.</span></a>
				<ul class="menu-content">
					<li id="1221"><a class="menu-item" href="<?php echo site_url('report/digitalcustomers'); ?>">Digital
							Customers</a></li>
					<li id="1222"><a class="menu-item"
							href="<?php echo site_url('report/subscriptioncustomers'); ?>">Subscription Customers</a>
					</li>
				</ul>
			</li>
			<?php }
					if($role == 0 || $role == 1 || $role == 2){
			?>
			<li id="125" class="nav-item">
				<a href="<?php echo site_url('account/invoice'); ?>"><i class="la la-list-ol"></i><span
						class="menu-title">Invoice</span></a>
			</li>
			<li id="128" class="nav-item">
				<a href="<?php echo site_url('report/gstdata'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">GST Data</span></a>
			</li>
			<li id="139" class="nav-item">
				<a href="<?php echo site_url('account/refund'); ?>"><i class="la la-reply"></i><span
						class="menu-title">Refund</span></a>
			</li>
			<?php }
					if($role == 0 || $role == 1 ){
			?>
			<li class=" navigation-header"><span>DATA LIST</span></li>

			<li id="102" class=" nav-item"><a href="#"><i class="la la-university"></i><span
						class="menu-title">Banks</span></a>
				<ul class="menu-content">
					<li id="1021"><a class="menu-item" href="<?php echo site_url('banks'); ?>">Banks</a></li>
					<li id="1022"><a class="menu-item" href="<?php echo site_url('banks/roipackages'); ?>">ROI
							Packages</a></li>
					<li id="1023"><a class="menu-item" href="<?php echo site_url('banks/applylinks'); ?>">Apply
							Links</a></li>
				</ul>
			</li>

			<li id="105" class=" nav-item"><a href="#"><i class="la la-graduation-cap"></i><span
						class="menu-title">Career</span></a>
				<ul class="menu-content">
					<li id="1051"><a class="menu-item" href="<?php echo site_url('career'); ?>">Career Opening</a></li>
					<li id="1052"><a class="menu-item" href="<?php echo site_url('enquiry/career'); ?>">Career
							Enquiry</a></li>
				</ul>
			</li>

			<li id="135" class="nav-item">
				<a href="<?php echo site_url('support/ticket'); ?>"><i class="la la-life-ring"></i><span
						class="menu-title">Support Request</span></a>
			</li>

			<li id="104" class="nav-item">
				<a href="<?php echo site_url('enquiry/contact'); ?>"><i class="la la-envelope"></i><span
						class="menu-title">Contact Enquiry</span></a>
			</li>

			<li id="116" class="nav-item">
				<a href="<?php echo site_url('site/newsletter'); ?>"><i class="la la-envelope"></i><span
						class="menu-title">Newsletter List</span></a>
			</li>


			<li class=" navigation-header"><span>SMS</span></li>

			<li id="150" class="nav-item">
				<a href="<?php echo site_url('sms/customsms'); ?>"><i class="la la-paper-plane"></i><span
						class="menu-title">Custom SMS</span></a>
			</li>

			<li id="131" class="nav-item">
				<a href="<?php echo site_url('site/smsmessages'); ?>"><i class="la la-comment"></i><span
						class="menu-title">SMS Messages</span></a>
			</li>


			<li id="123" class="nav-item">
				<a href="<?php echo site_url('site/remarketinglog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Remarketing Log</span></a>
			</li>

			<li id="127" class="nav-item">
				<a href="<?php echo site_url('site/bulksms'); ?>"><i class="la la-paper-plane"></i><span
						class="menu-title">Bulk SMS List</span></a>
			</li>

			<li id="121" class="nav-item">
				<a href="<?php echo site_url('site/sentotps'); ?>"><i class="la la-asterisk"></i><span
						class="menu-title">Sent OTPs</span></a>
			</li>
			<li id="148" class="nav-item"><a href="#"><i class="la la-ban"></i><span class="menu-title">DND
						List</span></a>
				<ul class="menu-content">
					<li id="1481"><a class="menu-item" href="<?php echo site_url('sms/dndlistdigital'); ?>">Digital
							Users</a></li>
					<li id="1482"><a class="menu-item"
							href="<?php echo site_url('sms/dndlistsubscription'); ?>">Subscription Users</a></li>
				</ul>
			</li>

			<li class=" navigation-header"><span>PAYMENT LOG</span></li>


			<!-- <li id="201" class="nav-item">
				<a href="<?php echo site_url('report/cashfreelog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Cashfree Log</span></a>
			</li>

			<li id="202" class="nav-item">
				<a href="<?php echo site_url('report/paytmlog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Paytm Log</span></a>
			</li> -->



			<li id="203" class="nav-item">
				<a href="<?php echo site_url('report/phonepelog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Phonepe Log</span></a>
			</li>
			<li id="206" class="nav-item">
				<a href="<?php echo site_url('report/worldlinelog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Worldline
						Log</span></a>
			</li>
			<li id="155" class="nav-item">
				<a href="<?php echo site_url('report/zaakpaylog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Zaakpay Log</span></a>
			</li>
			<li id="209" class="nav-item">
				<a href="<?php echo site_url('report/openmoneylog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Openmoney Log</span></a>
			</li>
			<li id="207" class="nav-item">
				<a href="<?php echo site_url('report/razorpaylog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Razorpay
						Log</span></a>
			</li>
			<li id="208" class="nav-item">
				<a href="<?php echo site_url('report/paygiclog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Paygic
						Log</span></a>
			</li>

			<li id="210" class="nav-item">
				<a href="<?php echo site_url('report/sabpaisalog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Sabpaisa Log</span></a>
			</li>
			<li id="211" class="nav-item">
				<a href="<?php echo site_url('report/jiolog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Jio Log</span></a>
			</li>
			<li id="212" class="nav-item">
				<a href="<?php echo site_url('report/easebuzzlog'); ?>"><i class="la la-bar-chart"></i><span
						class="menu-title">Easebuzz Log</span></a>
			</li>
			<li class=" navigation-header"><span>OTHER OPTIONS</span></li>

			<li id="140" class="nav-item">
				<a href="<?php echo site_url('site/fileremarks'); ?>"><i class="la la-university"></i><span
						class="menu-title">File Remarks</span></a>
			</li>

			<li id="130" class="nav-item">
				<a href="<?php echo site_url('site/impupdate'); ?>"><i class="la la-university"></i><span
						class="menu-title">Important Update</span></a>
			</li>


			<li id="106" class=" nav-item"><a href="#"><i class="la la-cog"></i><span class="menu-title">Site
						Options</span></a>
				<ul class="menu-content">
					<li id="1060"><a class="menu-item" href="<?php echo site_url('site/sitesettings'); ?>">Facebook
							Settings</a></li>
					<li id="1066"><a class="menu-item" href="<?php echo site_url('site/accountmsg'); ?>">Account
							Message</a></li>
					<li id="1064"><a class="menu-item"
							href="<?php echo site_url('site/editPage/welcome-message'); ?>">Welcome Message</a></li>
				</ul>
			</li>

			<li id="117" class=" nav-item"><a href="#"><i class="la la-file"></i><span
						class="menu-title">Pages</span></a>
				<ul class="menu-content">
					<li id="1171"><a class="menu-item"
							href="<?php echo site_url('site/editPage/privacy-policy'); ?>">Privcay Policy</a></li>
					<li id="11711"><a class="menu-item"
							href="<?php echo site_url('site/editPage/refund-policy'); ?>">Refund Policy</a></li>
					<li id="1175"><a class="menu-item"
							href="<?php echo site_url('site/editPage/disclaimer'); ?>">Disclaimer</a></li>
					<li id="1172"><a class="menu-item"
							href="<?php echo site_url('site/editPage/terms-conditions'); ?>">Terms & Conditions</a></li>
					<li id="11712"><a class="menu-item"
							href="<?php echo site_url('site/editPage/customer-legal-agreement'); ?>">Customer - Legal
							Agreement</a></li>
					<li id="11713"><a class="menu-item"
							href="<?php echo site_url('site/editPage/subscription-customer-legal-agreement'); ?>">Subscription
							- Legal Agreement</a></li>
				</ul>
			</li>
			<?php }
			if($role == 0 ){
			?>
			<li id="143" class="nav-item">
				<a href="<?php echo site_url('site/stafflist'); ?>"><i class="la la-users"></i><span
						class="menu-title">Staff List</span></a>
			</li>
			<?php
			} ?>

		</ul>

		<div class="mb-5"></div>
	</div>
</div>
