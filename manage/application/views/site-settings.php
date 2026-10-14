<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
	window.onload = function () {
		document.getElementById("106").className += " active";
		document.getElementById("1060").className += " active";
	}

</script>

<div class="content-header row">
	<div class="content-header-left col-md-12 col-12 mb-1">
		<h1 class="content-header-title text-uppercase">Site Settings</h1>
	</div>
</div>

<div class="content-body">
	<div class="row">

		<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">SMS Sender id - Digital</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatesmssenderid', array('id' => 'filterForm3', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="smssenderid" type="text" class="input-sm form-control col-md-9"
										id="smssenderid" value="<?php echo $sitedetails['smssenderid']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">SMS Sender id - Subscription</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatesmssenderidsubscription', array('id' => 'filterForm3', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="smssenderidsubscription" type="text"
										class="input-sm form-control col-md-9" id="smssenderidsubscription"
										value="<?php echo $sitedetails['smssenderidsubscription']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-body">
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Facebook Domain Verification Id</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbdomain', array('id' => 'filterForm1', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="domainid" type="text" class="input-sm form-control col-md-9"
										id="domainid" value="<?php echo $sitedetails['fbdomainvalue']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Site Welcome Model</dt>
							<dd class="col-md-9 col-12">
								<span class="mr-2">
									<?php
                  echo ($sitedetails['welcomemodel']->option_value == 1) ? "Show" : "Hide";
                  ?>
								</span>
								<a href="<?php echo site_url('site/modelstatus/' . $sitedetails['welcomemodel']->option_value); ?>"
									target="_self" class="btn btn-icon btn-outline-dark btn-sm"><i class="la la-rotate-left"></i></a>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-header">
						<h3>Facebook - Digital</h3>
					</div>

					<div class="card-body">
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">FB Pixel Key</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbpixel', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="pixelid" type="text" class="input-sm form-control col-md-9" id="pixelid"
										value="<?php echo $sitedetails['fbpixelvalue']->option_value; ?>" style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">FB Access Token</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbaccesstoken', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="fbaccesstoken" type="text" class="input-sm form-control col-md-9"
										id="fbaccesstoken" value="<?php echo $sitedetails['fbaccesstoken']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">FB Event Name</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbeventname', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="fbeventname" type="text" class="input-sm form-control col-md-9"
										id="fbeventname" value="<?php echo $sitedetails['fbeventname']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">FB Event ID</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbeventid', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="fbeventid" type="text" class="input-sm form-control col-md-9"
										id="fbeventid" value="<?php echo $sitedetails['fbeventid']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-header">
						<h3>Facebook - Subscription</h3>
					</div>

					<div class="card-body">
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">FB Pixel Key</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbpixelsubscription', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="fbpixelvaluesubscription" type="text"
										class="input-sm form-control col-md-9" id="fbpixelvaluesubscription"
										value="<?php echo $sitedetails['fbpixelvaluesubscription']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">FB Access Token</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbaccesstokensubscription', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="fbaccesstokensubscription" type="text"
										class="input-sm form-control col-md-9" id="fbaccesstokensubscription"
										value="<?php echo $sitedetails['fbaccesstokensubscription']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">FB Event Name</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbeventnamesubscription', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="fbeventnamesubscription" type="text"
										class="input-sm form-control col-md-9" id="fbeventnamesubscription"
										value="<?php echo $sitedetails['fbeventnamesubscription']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">FB Event ID</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatefbeventidsubscription', array('id' => 'filterForm2', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="fbeventidsubscription" type="text"
										class="input-sm form-control col-md-9" id="fbeventidsubscription"
										value="<?php echo $sitedetails['fbeventidsubscription']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-header">
						<h3>Whatsapp - Digital</h3>
					</div>

					<div class="card-body">
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Whatsapp Campaign - Remarketing</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatewpcampmain', array('id' => 'filterForm6', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="wpcampaignmain" type="text" class="input-sm form-control col-md-9"
										id="wpcampaignmain" value="<?php echo $sitedetails['wpcampaignmain']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Whatsapp Campaign - Get Offer</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatewpcampmainoffer', array('id' => 'filterForm7', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="wpcampaignoffer" type="text" class="input-sm form-control col-md-9"
										id="wpcampaignoffer" value="<?php echo $sitedetails['wpcampaignoffer']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Whatsapp Campaign - Payment Success</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatewpcampmainsuccess', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="wpcampaignsuccess" type="text" class="input-sm form-control col-md-9"
										id="wpcampaignsuccess" value="<?php echo $sitedetails['wpcampaignsuccess']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Whatsapp Campaign - Username Password</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/update_aisency_usrpass', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="aisency_user_password" type="text"
										class="input-sm form-control col-md-9" id="aisency_user_password"
										value="<?php echo $sitedetails['aisency_userwelcomename']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-6 col-md-6 col-12">
			<div class="card">
				<div class="card-content">
					<div class="card-header">
						<h3>Whatsapp - Subscription</h3>
					</div>

					<div class="card-body">
						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Whatsapp Campaign - Remarketing</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatewpcampsubscription', array('id' => 'filterForm6', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="wpcampaignsubscription" type="text" class="input-sm form-control col-md-9"
										id="wpcampaignsubscription" value="<?php echo $sitedetails['wpcampaignsubscription']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Whatsapp Campaign - Get Offer</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatewpcampmainoffersubscription', array('id' => 'filterForm7', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="wpcampaignoffersubscription" type="text" class="input-sm form-control col-md-9"
										id="wpcampaignoffersubscription" value="<?php echo $sitedetails['wpcampaignoffersubscription']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>

						<hr class="mb-2" />

						<dl class="row mb-0">
							<dt class="col-md-3 col-12">Whatsapp Campaign - Payment Success</dt>
							<dd class="col-md-9 col-12">
								<?php echo form_open('site/updatewpcampmainsuccesssubscription', array('id' => 'filterForm8', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
								<span class="mr-2"><input name="wpcampaignsuccesssubscription" type="text" class="input-sm form-control col-md-9"
										id="wpcampaignsuccesssubscription" value="<?php echo $sitedetails['wpcampaignsuccesssubscription']->option_value; ?>"
										style="display: inline;" /></span>
								<button class="btn btn-outline-dark btn-sm" name="submit" type="submit">Update</button>
								<?php echo form_close(); ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>
