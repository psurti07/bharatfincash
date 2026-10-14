    <!---==============footer start =================-->
    <div class="footer_area footer_two" id="footer_contents">
      <div class="footer_copy_right bg_dark_3">
        <!--===============spacing==============-->
        <div class="pd_top_20"></div>
        <!--===============spacing==============-->
        <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="footer_copy_content text-center">
              <small><?php echo date('Y')." &copy; ".COMPANY_NAME; ?>. All rights reserved.</small>
            </div>
          </div>
        </div>
        </div>
        <!--===============spacing==============-->
        <div class="pd_bottom_20"></div>
        <!--===============spacing==============-->
      </div>
    </div>
    <!---==============footer end =================-->

  </div> 

  <!---========================== javascript ==========================-->
    <script type='text/javascript' src='<?php echo base_url("assets/js/jquery-3.6.0.min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/bootstrap.min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/jquery.fancybox.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/jquery.flexslider-min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/owl.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/swiper.min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/isotope.min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/simpleParallax.min.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/appear.js"); ?>'></script>
    <script type='text/javascript' src='<?php echo base_url("assets/js/plugins.js"); ?>'></script>

    <script src="<?php echo base_url('assets/js/validation/jqBootstrapValidation.js'); ?>" type="text/javascript"></script>
    
    <script src="<?php echo base_url('assets/plugins/validate/form-validation.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/validate/form-validation.min.js'); ?>" type="text/javascript"></script>

    <script type='text/javascript' src='<?php echo base_url('assets/js/creote-extension.js'); ?>'></script>
   
    <script src="<?php echo base_url('assets/plugins/datatables/js/datatables.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/js/jszip.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/js/pdfmake.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/js/vfs_fonts.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/js/buttons.html5.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/plugins/datatables/js/buttons.print.min.js'); ?>" type="text/javascript"></script>

    <script src="<?php echo base_url('assets/js/html2canvas.js'); ?>" type="text/javascript"></script>
    <!---========================== javascript ==========================-->

    <script type="text/javascript">
    $(document).ready(function() {

      $('#loanamount, #monincome, #monemi, #monthlyincome, #cardamount').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 7);
        $(this).val(inputVal);
      });

      $('#mobileno, #mobile').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 10);
        $(this).val(inputVal);
      });

      $('#user_aadharcard_number').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 12);
        $(this).val(inputVal);
      });

      $('#cardnumber').on('input', function() {
        var inputVal = $(this).val();
        inputVal = inputVal.replace(/\D/g, '');
        inputVal = inputVal.slice(0, 16);
        $(this).val(inputVal);
      });

      $('#pincode').on('keyup', function () {
			var pincode = $(this).val();

			if (pincode.length === 6) {
				$.ajax({
					url: '<?= base_url("get-location/") ?>' + pincode,
					type: 'GET',
					dataType: 'json',
					success: function (response) {
						if (response.error) {
							$('#city').val('');
							$('#state').val('');
						} else {
							$('#city').val(response.city);
							$('#state').val(response.state);
						}
					},
					error: function () {
						$('#city').val('');
						$('#state').val('');
					}
				});
			} else {
				$('#city').val('');
				$('#state').val('');
			}
		});

    });
  </script>

</body>
</html>