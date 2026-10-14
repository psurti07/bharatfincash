<?php
    $this->load->view('includes/header.php');
?>	

<div id="slider" class="inspiro-slider" data-height-xs="360">
	<div class="slide" data-bg-image="<?php echo base_url('assets/images/slider/bl-page-banner.jpg'); ?>">
		<div class="container">
			<div class="slide-captions">
				<h3 class="text-dark">Business Loans With Easy Process</h3>
				<h5 class="m-b-40 text-dark">
					- Best Interest Rate</br>
					- Convenient Tenure: 3-6 Years</br>
					- 100% Online Process</br>
					- Flexible EMI Options
				</h5>
				<a href="<?php echo site_url('digital/businessLoan'); ?>" class="btn btn-dark btn-outline"><span>Apply Now</span></a>
			</div>
		</div>
	</div>
</div>

<section class="p-b-0">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-12 m-b-20 text-justify">
				<p>We at <?php echo PROJECT_NAME; ?> have immense admiration for the business-owning individuals as they generate employment and make a substantial contribution to the country's progress. To facilitate them in helping them fetch easy finances, <?php echo PROJECT_NAME; ?> is dedicated to offering quick business loans via a completely digital and paperless process. As <?php echo PROJECT_NAME; ?> is partnered with several Banks and NBFCs (Non-Banking Financial Companies), a loan seeker can get business loan offers from several banks and can choose the most convenient one. Also, to get a loan, the loan seeker is not needed to go to the banks personally and do the document submission process – <?php echo PROJECT_NAME; ?> will take care of everything – from document submission to providing you with multiple business loan offers.</p>

				<p>With <?php echo PROJECT_NAME; ?>, you can get a business loan of up to Rs.15 Lakh at best interest rates – and all this in just 48 hours. With a business loan, you can plan your business expansion and take your business to new heights of success, progress, and scale. To get a business loan, you just need to go through a very simple and quick registration process and our team will assist to take your loan process further. You can just relax at home while we will work dedicatedly towards fetching the best business loan offers for you. You can get a transparent view of your probable loan through our loan calculator.</p>
			</div>
		</div>
	</div>
</section>

<div class="line"></div>

<section class="p-t-20 p-b-0">
	<div class="container">
		<div class="heading-text heading-plain text-center m-b-0">
			<h4 class="m-b-0">Amazing Advantages & Features</h4>
		</div>

		<div class="row p-t-20">
			<div class="col-lg-4 col-sm-12">
				<div class="icon-box center process w-100 p-20">
					<h3>100% Digital & Paperless Loan</h3>
					<p class="m-b-0">You need not visit banks several times and get exhausted. With us, you will experience hassle-free online loan processes.</p>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12">
				<div class="icon-box center process w-100 p-20">
					<h3>Instant Disbursal</h3>
					<p class="m-b-0">Once all the checks are done, you can receive the loan amount directly in your bank within 48 hours.</p>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12">
				<div class="icon-box center process w-100 p-20">
					<h3>Range of Attractive Rates</h3>
					<p class="m-b-0">Choose the best interest rates from multiple loan offers for flexible and unobstructed repayment.</p>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12">
				<div class="icon-box center process w-100 p-20">
					<h3>Business Loans up to Rs.15 Lakh</h3>
					<p class="m-b-0">Get a business loan quickly and boost your business with timely investment.</p>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12">
				<div class="icon-box center process w-100 p-20">
					<h3>Free Expert Consultancy</h3>
					<p class="m-b-0">You will be guided by our experts throughout the entire loan process, enabling you to make better decisions.</p>
				</div>
			</div>

			<div class="col-lg-4 col-sm-12">
				<div class="icon-box center process w-100 p-20">
					<h3>Instant Loan From Multiple Banks</h3>
					<p class="m-b-0">We're partnered with multiple banks and NBFCs to give you a wide range of best and convenient business loan offers.</p>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="line"></div>

<section class="p-t-20 p-b-0">
	<div class="container">
		<div class="heading-text heading-plain text-center">
			<h4 class="m-b-0">Why <?php echo PROJECT_NAME; ?>?</h4>
		</div>

		<div class="row">
			<div class="col-12 text-center">
				<p class="lead">Being one of the most appreciated and praised loan service providers, <?php echo PROJECT_NAME; ?> boasts of serving a huge number of customers in the most satisfied and professional manner. The company has garnered a great volume of acclaim due to its authentic services in giving the industry-best loan offerings.</p>
			</div>
		</div>
	</div>
</section>

<div class="line"></div>

<?php if(count($testimoniallist) > 0) { ?>
<section class="p-t-30">
	<div class="container">
		<div class="heading-text heading-plain text-center p-b-10">
			<h4>Our Customers Testimonials</h4>
		</div>
		
		<div class="carousel equalize testimonial testimonial-box" data-margin="20" data-arrows="false" data-items="3" data-items-sm="2" data-items-xxs="1" data-equalize-item=".testimonial-item">
			<?php foreach ($testimoniallist as $row) { ?>
				<div class="testimonial-item"> 
					<img src="<?php echo base_url('assets/images/customers/'.$row->photo); ?>" alt="customer img">
					<div class="rateit" data-rateit-mode="font" data-rateit-ispreset="true" data-rateit-readonly="true" data-rateit-value="<?php echo $row->ratings; ?>"></div>
					<p><?php echo $row->reviews; ?></p> 
					<span class="p-b-20"><?php echo $row->fullname; ?></span>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<?php } ?>

<div class="line"></div>

<section class="p-t-20 p-b-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6 col-12 m-b-20">
				<h3>Small Business Person Eligibility Criteria</h3>

				<ul class="list-icon list-icon-check list-icon-colored">
					<li>Age Criteria: The loan applicant's age should be at least 21 years.</li>
					<li>Business Stability: Minimum of 1 year of business stability is required.</li>
					<li>IT Return: At least 1 Year of ITR is a must.</li>
				</ul>
			</div>

			<div class="col-lg-6 col-md-6 col-12 m-b-20">
				<h3>Audited Report Person Eligibility Criteria</h3>

				<ul class="list-icon list-icon-check list-icon-colored">
					<li>Age Criteria: The loan applicant's age should be at least 21 years.</li>
					<li>Turnover: Minimum yearly turnover should be Rs.15 Lakh.</li>
					<li>Audit Report: Minimum 2 years of Audited Reports.</li>
				</ul>
			</div>
	
			<div class="col-lg-6 col-md-6 col-12 m-b-20">
				<h3>Quick Loan Application Process</h3>

				<ul class="list-icon list-icon-check list-icon-colored">
					<li>Easy Registration</li>
					<li>Check Eligibility</li>
					<li>Buy Plan</li>
					<li>Upload Documents</li>
					<li>Bank Verification</li>
					<li>Loan Sanction</li>
				</ul>
			</div>

			<div class="col-lg-6 col-md-6 col-12 m-b-20">
				<h3>Documents Required For Business Loan</h3>

				<ul class="list-icon list-icon-check list-icon-colored">
					<li>Address Proof</li>
					<li>Age Proof</li>
					<li>Identity Proof</li>
					<li>Photographs</li>
					<li>Proof of Income</li>
					<li>Bank Statements</li>
					<li>ITR or GST</li>
					<li>Business Existence Proof (e.g. Certificate of Incorporation, etc.)</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<div class="line"></div>

<section class="p-t-20">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3>Business Loan for Several Pursuits</h3>

				<ul class="list-icon list-icon-check list-icon-colored">
					<li>Maintain Good Money Flow: Fulfil monetary needs of your business as at any stage, its requirement may arise.</li>
					<li>On-Time Payments To Suppliers: Never let non-payments hinder your supply. Through a business loan, ensure smooth supplier payments.</li>
					<li>Business Expansion: Plan to expand your business' wings with quick investment through a business loan.</li>
					<li>Business Upscaling: Take your business to the peak of growth by investing in new arms of your business.</li>
					<li>Hire Smart Talents: Young & talented minds will grow your business amazingly. Take a loan and bring in skilled minds.</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<div class="call-to-action call-to-action-colored m-b-0">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h3>Bring Business Growth Progression With Instant Business Loan Online</h3>
			</div>

			<div class="col-md-3 text-center">
				<a class="btn btn-light" href="<?php echo site_url('digital/businessLoan'); ?>">Apply Now</a>
			</div>
		</div>
	</div>
</div>

<?php
    $this->load->view('includes/footer.php');
?>