<?php
	$this->load->view('includes/header.php');
?>
<?php echo link_tag('assets/plugins/calc/css/commoncalculator.css'); ?>
<?php echo link_tag('assets/plugins/calc/css/emicalculator.css'); ?>
<?php echo link_tag('assets/plugins/calc/css/calcstyle.css'); ?>

<section id="page-title">
	<div class="container">
		<div class="breadcrumb text-left">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Loan Calculator</li>
				</ol>
			</nav>
		</div>
	</div>
</section>


<section>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="calculatorcontainer">
            <div class="emicalculatorcontainer">
              <div id="loanformcontainer" class="row">
                <div id="emicalculatordashboard" class="col-sm-12">
                  <div class="cleardiv"></div>
                  <div id="emicalculatorinnerformwrapper">
                    <form id="emicalculatorform">
                      <div class="form-horizontal" id="emicalculatorinnerform">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="row form-group lamount">
                              <label class="col-lg-4 control-label" for="loanamount">Loan Amount</label>
                              <div class="col-lg-6">
                                <div class="input-group">
                                  <input class="form-control" id="loanamount" name="loanamount" value="10,00,000" type="text">
                                  <div class="input-group-append">
                                    <span class="input-group-text">₹</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="loanamountslider"></div>
                            <div id="loanamountsteps" class="steps">
                              <span class="tick" style="left: 0%;">| <br>
                                <span class="marker">0</span>
                              </span>
                              <span class="tick d-none d-sm-block" style="left: 12.5%;">| <br>
                                <span class="marker">10L</span>
                              </span>
                              <span class=tick style="left: 25%;">| <br>
                                <span class=marker>20L</span>
                              </span>
                              <span class="tick d-none d-sm-block" style="left: 37.5%;">| <br>
                                <span class="marker">30L</span>
                              </span>
                              <span class="tick" style="left: 50%;">| <br>
                                <span class="marker">40L</span>
                              </span>
                              <span class="tick d-none d-sm-block" style="left: 62.5%;">| <br>
                                <span class="marker">50L</span>
                              </span>
                              <span class="tick" style="left: 75%;">| <br>
                                <span class="marker">60L</span>
                              </span>
                              <span class="tick d-none d-sm-block" style="left: 87.5%;">| <br>
                                <span class="marker">70L</span>
                              </span>
                              <span class="tick" style="left: 100%;">| <br>
                                <span class="marker">80L</span>
                              </span>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="row form-group lint">
                              <label class="col-lg-4 control-label" for="loaninterest">Interest Rate</label>
                              <div class="col-lg-6">
                                <div class="input-group">
                                  <input class="form-control" id="loaninterest" name="loaninterest" value="10.5" type="text">
                                  <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="loaninterestslider"></div>
                            <div id="loanintereststeps" class="steps">
                              <span class="tick" style="left: 0%;">| <br>
                                <span class="marker">5</span>
                              </span>
                              <span class="tick" style="left: 16.67%;">| <br>
                                <span class="marker">7.5</span>
                              </span>
                              <span class="tick" style="left: 33.34%;">| <br>
                                <span class="marker">10</span>
                              </span>
                              <span class="tick" style="left: 50%;">| <br>
                                <span class="marker">12.5</span>
                              </span>
                              <span class="tick" style="left: 66.67%;">| <br>
                                <span class="marker">15</span>
                              </span>
                              <span class="tick" style="left: 83.34%;">| <br>
                                <span class="marker">17.5</span>
                              </span>
                              <span class="tick" style="left: 100%;">| <br>
                                <span class="marker">20</span>
                              </span>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="row form-group lterm">
                              <label class="col-lg-4 control-label" for="loanterm">Loan Tenure</label>
                              <div class="col-lg-6">
                                <div class="loantermwrapper">
                                  <div class="input-group">
                                    <input class="form-control" id="loanterm" name="loanterm" value="20" type="text">
                                    <div class="input-group-append tenure-choice" data-toggle="buttons">
                                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-dark active">
                                          <input type="radio" name="loantenure" id="loanyears" value="loanyears" tabindex="4" autocomplete="off" checked="checked">Yr </label>
                                        <label class="btn btn-dark">
                                          <input type="radio" name="loantenure" id="loanmonths" value="loanmonths" tabindex="5" autocomplete="off">Mo </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div id="loantermslider"></div>
                            <div id="loantermsteps" class="steps">
                              <span class="tick" style="left: 0%;">| <br>
                                <span class="marker">0</span>
                              </span>
                              <span class="tick" style="left: 16.67%;">| <br>
                                <span class="marker">5</span>
                              </span>
                              <span class="tick" style="left: 33.33%;">| <br>
                                <span class="marker">10</span>
                              </span>
                              <span class="tick" style="left: 50%;">| <br>
                                <span class="marker">15</span>
                              </span>
                              <span class="tick" style="left: 66.67%;">| <br>
                                <span class="marker">20</span>
                              </span>
                              <span class="tick" style="left: 83.33%;">| <br>
                                <span class="marker">25</span>
                              </span>
                              <span class="tick" style="left: 100%;">| <br>
                                <span class="marker">30</span>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div id="leschemewrapper" class="sep toggle-visible">
                          <div class="sep row form-group escheme">
                            <label class="col-lg-4 control-label" for="emischeme">EMI Scheme</label>
                            <div class="col-lg-8">
                              <div class="input-group emischemes">
                                <div class="btn-group btn-group-toggle add-check" data-toggle="buttons">
                                  <label class="btn btn-secondary">
                                    <input type="radio" name="emischeme" id="emiadvance" value="emiadvance" tabindex="4" autocomplete="off">EMI in Advance </label>
                                  <label class="btn btn-secondary active">
                                    <input type="radio" name="emischeme" id="emiarrears" value="emiarrears" tabindex="5" autocomplete="off" checked="checked">EMI in Arrears </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <input id="loanproduct" name="loanproduct" value type="hidden">
                      <input id="loanstartdate" name="loanstartdate" value type="hidden">
                      <input id="loanyearformat" name="loanyearformat" value type="hidden">
                      <input id="loandata" name="loandata" value type="hidden">
                      <input id="calcversion" name="calcversion" value=4.0 type="hidden">
                    </form>
                    <div class="row gutter-left gutter-right">
                      <div id="emipaymentsummary" class="col-sm-5 col-md-6 no-gutter-left no-gutter-right">
                        <div id="emiamount">
                          <h4>Loan EMI</h4>
                          <p>₹ <span>24,959</span>
                          </p>
                        </div>
                        <div id="emitotalinterest">
                          <h4>Total Interest Payable</h4>
                          <p>₹ <span>34,90,279</span>
                          </p>
                        </div>
                        <div id="emitotalamount" class="column-last">
                          <h4>Total Payment <br>(Principal + Interest) </h4>
                          <p>₹ <span>59,90,279</span>
                          </p>
                        </div>
                      </div>
                      <div id="emipiechart" class="no-gutter-left no-gutter-right col-sm-7 col-md-6 highcharts-container"></div>
                    </div>
                  </div>
                </div>
              </div>
              
              <div id="emipaymentdetails">
                <form class="gutter-left gutter-right form-horizontal">
                  <div class="row form-group" id="emipaymentscheduleheader">
                    <label class="col-md-4 col-lg-5 control-label" for="startmonthyear">Schedule showing EMI payments starting from</label>
                    <div class="col-md-4 col-lg-3">
                      <div class="input-group">
                        <input class="form-control" id="startmonthyear" name="startmonthyear" value type="text">
                        <div class="input-group-append">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4 col-lg-3 form-group lyearformat">
                      <select class="form-control" tabindex="15" name="yearformat" id="yearformat">
                        <option value="calendaryear" selected="selected">Calendar Year wise</option>
                        <option value="financialyear">Financial Year wise</option>
                      </select>
                    </div>
                  </div>
                </form>
                <div id="emibarchart" class="hidden-ts highcharts-container"></div>
                <div id="emipaymenttable"></div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</section>

<section class="background-grey">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<p class="lead">Instant personal loan EMI calculator makes it easy for you to figure out the monthly instalments on your loan.</p>

				<p class="lead">When you take an <a href="<?php echo site_url('digital/personalLoan'); ?>" target="_self">Instant personal loan</a>, the equated monthly instalment is a key factor in deciding the loan amount and tenure. The <a href="<?php echo site_url('loan/calculator'); ?>" target="_self">personal loan calculator</a> helps you instantly calculate your pay-outs and, therefore, plan your personal loan and repayment better.</p>

				<p class="lead">To calculate your EMI, just enter the loan amount, rate of interest and loan tenure, and your EMI is instantly displayed. You can enter loan amounts from 25,000/- to 40,00,000/- on term from 1 to 5 years.</p>

				<p class="lead">The personal loan EMI calculator is designed to be easy-to-use and intuitive.You can use the personal loan EMI calculator to calculate the EMI on personal loan from any bank or financial institution. It is free to use.</p>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="container">
		<div class="row">
			<div class="col-6">
				<div class="accordion">
					<div class="ac-item">
						<h5 class="ac-title">What is personal loan EMI?</h5>
						<div class="ac-content">
							<p>EMI, or Equated Monthly Instalment, is the fixed amount paid by a borrower every month to clear off the loan taken from a bank. It is scheduled at a specific date of every calendar month and includes both principal and interest components. Your personal loan EMI depends on the loan principal, the rate of interest and the loan tenure.</p>
						</div>
					</div>

					<div class="ac-item">
						<h5 class="ac-title">How to calculate personal loan EMI?</h5>
						<div class="ac-content">
							<p>It is essential to calculate your EMI before applying for a personal loan. While you can do so manually, using a Personal loan calculator can help you determine the more accurate value. You can select the required loan amount, tenure and rate of interest to get the exact payable EMI amount with an interactive chart.</p>
						</div>
					</div>

					<div class="ac-item">
						<h5 class="ac-title">How to reduce your personal loan EMI?</h5>
						<div class="ac-content">
							<p>EMI may affect your monthly expenses until you repay it. Some simple steps that can help you reduce the personal loan EMI and manage outlays easily are:</p>
							<ul>
								<li>Option for a longer repayment tenor - It will help you spread the loan cost over a longer duration and help you pay in small installment </li>
								<li>Negotiate with the loan provider for a lower rate of interest</li>
								<li>Maintain a strong CIBIL score to enjoy lower interest rates and reduced EMI</li>
								<li>Become a Indcapital Member for the best deals as per your needs and repaying capacity</li>
							</ul>
						</div>
					</div>

					<div class="ac-item">
						<h5 class="ac-title">What are the factors that affect personal loan EMI?</h5>
						<div class="ac-content">
							<p>Following factors affect personal loan EMI</p>
							<ul>
								<li>Loan amount - Monthly instalments payable are directly proportional to the loan amount opted for. The higher the loan amount the higher will be your EMI.</li>
								<li>Applicable cornet Interest -Interest rate is a percentage at which lenders charge interest on the Loan amount. A higher interest rate increases the EMIs and vice versa.</li>
								<li>Tenor - it is the repayment period for the personal loan availed and is inversely related to EMIs. A longer tenor reduces monthly instalments while a shorter tenor increases them.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="col-6">
				<div class="accordion">
					<div class="ac-item">
						<h5 class="ac-title">What is business loan EMI?</h5>
						<div class="ac-content">
							<p>EMI, or Equated Monthly Instalment, is the fixed amount paid by a borrower every month to clear off the loan taken from a bank. It is scheduled at a specific date of every calendar month and includes both principal and interest components. Your <a href="<?php echo site_url('digital/businessLoan'); ?>" target="_self">business loan EMI</a> depends on the loan principal, the rate of interest and the loan tenure.</p>
						</div>
					</div>

					<div class="ac-item">
						<h5 class="ac-title">How to calculate business loan EMI?</h5>
						<div class="ac-content">
							<p>It is essential to calculate your EMI before applying for a Business loan. While you can do so manually, using a <a href="<?php echo site_url('loan/calculator'); ?>" target="_self">Business loan calculator</a> can help you determine the more accurate value. You can select the required loan amount, tenure and rate of interest to get the exact payable EMI amount with an interactive chart.</p>
						</div>
					</div>

					<div class="ac-item">
						<h5 class="ac-title">How to reduce your Business loan EMI?</h5>
						<div class="ac-content">
							<p>EMI may affect your monthly expenses until you repay it. Some simple steps that can help you reduce the Business loan EMI and manage outlays easily are:</p>
							<ul>
								<li>Option for a longer repayment tenor - It will help you spread the loan cost over a longer duration and help you pay in small installment</li>
								<li>Negotiate with the loan provider for a lower rate of interest</li>
								<li>Maintain a strong CIBIL score to enjoy lower interest rates and reduced EMI</li>
								<li>Become a Indcapital Member for the best deals as per your needs and repaying capacity</li>
							</ul>
						</div>
					</div>

					<div class="ac-item">
						<h5 class="ac-title">What are the factors that affect Business loan EMI?</h5>
						<div class="ac-content">
							<p>Following factors affect Business loan EMI:</p>
							<ul>
								<li>Loan amount - Monthly instalments payable are directly proportional to the loan amount opted for. The higher the loan amount the higher will be your EMI.</li>
								<li>Applicable cornet Interest - Interest rate is a percentage at which lenders charge interest on the Loan amount. A higher interest rate increases the EMIs and vice versa.</li>
								<li>Tenor - it is the repayment period for the Business loan availed and is inversely related to EMIs. A longer tenor reduces monthly instalments while a shorter tenor increases them.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section> 


<?php
	$this->load->view('includes/footer.php');
?>
<script src="<?php echo base_url('assets/plugins/calc/js/calccore.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/calc/js/mouse.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/calc/js/slider.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/calc/js/commoncalculator.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/plugins/calc/js/emicalculator.js'); ?>" type="text/javascript"></script>
