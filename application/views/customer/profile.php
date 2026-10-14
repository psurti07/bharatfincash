<?php
    $this->load->view('customer/includes/header.php');

    if($profiledata->cardtype == 12) {
        $loantype = "bl";
    }
    else {
      $loantype = "pl";
    }
?>
<!--===============PAGE CONTENT==============-->
<div id="content" class="site-content ">
  <!---about--->
  <section class="about-section">
    <!--===============spacing==============-->
    <div class="pd_top_90"></div>
    <!--===============spacing==============-->
    <div class="container">
      <div class="row">
        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12">
          <section class="contact_form_box_all type_two">
            <div class="contact_form_box_inner simple_form">
              <div class="contact_form_shortcode">
                <div class="heading pd_bottom_10">
                  <h2 class="pd_bottom_20">Profile Details</h2>
                  <p class="text-dark ">Registration On :
                    <strong><?php echo displayDate($profiledata->rec_date); ?></strong></p>
                  <p class="text-dark ">Mobile No : <strong><?php echo $profiledata->mobile; ?></strong></p>
                </div>

                <div role="form" class="wpcf7">
                  <?php echo form_open('customer/profile/changeprofile', array('id'=>'submitForm1', 'class'=>'wpcf7-form init', 'novalidate'=>'novalidate')); ?>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> Your name<br>
                          <span class="wpcf7-form-control-wrap fullname"><input type="text" name="fullname"
                              value="<?php echo $profiledata->fullname; ?>" size="40"
                              class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true"
                              placeholder="Enter Your Name"></span><br>
                          <div class="help-block font-small-3"></div>
                        </label>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> Your email<br>
                          <span class="wpcf7-form-control-wrap emailid"><input type="email" name="emailid"
                              value="<?php echo $profiledata->email; ?>" size="40"
                              class="wpcf7-form-control wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email"
                              aria-required="true" placeholder="Enter Your Email"></span><br>
                          <div class="help-block font-small-3"></div>
                        </label>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Pincode <abbr class="required" title="required">*</abbr></label>
                        <input type="text" aria-required="true" name="pincode" id="pincode" class="form-control" value="<?php echo $profiledata->pincode; ?>"
                          required inputmode="numeric" minlength="6" maxlength="6" data-validation-regex-regex="[0-9]+"
                          oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        <div class="help-block font-small-3"></div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label> City<br>
                          <span class="wpcf7-form-control-wrap city"><input type="text" name="city" id="city"
                              value="<?php echo $profiledata->city; ?>" size="40"
                              class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-tel" aria-required="true"
                              placeholder="Enter Your City"></span><br>
                          <div class="help-block font-small-3"></div>
                        </label>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>State</label>
                        <select name="state" id="state" class="state_select select2-hidden-accessible"
                          data-placeholder="Select state" data-input-classes="" data-label="state" tabindex="-1"
                          aria-hidden="true">
                          <option value="">Select state</option>
                          <?php echo getStateOption($profiledata->state); ?>
                        </select>
                        <div class="help-block font-small-3"></div>
                      </div>
                    </div>

                    <div class="col-lg-12">
                      <div class="form-group">
                        <button type="submit" id="submit-submit1"
                          class="wpcf7-form-control has-spinner wpcf7-submit">CHANGE</button>
                      </div>
                    </div>
                  </div>

                  <?php echo form_close(); ?>
                </div>
              </div>
            </div>
          </section>
        </div>

        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12 mb-5 mb-lg-5 mb-xl-0">
          <section class="contact_form_box_all type_two">
            <div class="contact_form_box_inner">
              <div class="contact_form_shortcode">
                <div class="heading">
                  <h6>Change Password</h6>
                </div>

                <div class="_form">
                  <div role="form" class="wpcf7">

                    <?php echo form_open('customer/profile/changepassword', array('id'=>'submitForm', 'class'=>'wpcf7-form init', 'novalidate'=>'novalidate')); ?>

                    <div class="form-group">
                      <label> Your password<br>
                        <span class="wpcf7-form-control-wrap fullname"><input type="password" name="password" size="40"
                            class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" aria-required="true"
                            placeholder="New Password"></span><br>
                        <i class="fa fa-lock"></i><br>
                        <div class="help-block font-small-3"></div>
                      </label>
                    </div>

                    <div class="form-group">
                      <label> Retype password<br>
                        <span class="wpcf7-form-control-wrap fullname"><input type="password" name="retypepassword"
                            size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required"
                            aria-required="true" placeholder="Retype Password"></span><br>
                        <i class="fa fa-lock"></i><br>
                        <div class="help-block font-small-3"></div>
                      </label>
                    </div>

                    <div class="form-group">
                      <button type="submit" id="submit-submit"
                        class="wpcf7-form-control has-spinner wpcf7-submit">CHANGE</button>
                    </div>

                    <?php echo form_close(); ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>

      </div>
    </div>
    <!--===============spacing==============-->
    <div class="pd_bottom_70"></div>
    <!--===============spacing==============-->
  </section>
  <!---about end--->

</div>
<!--===============PAGE CONTENT END==============-->

<?php
    $this->load->view('customer/includes/footer.php');
?>
<script type="text/javascript">
  $(function () {
    $('#submitForm').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action') || window.location.pathname,
        type: "POST",
        data: $(this).serialize(),
        dataType: "JSON",
        cache: false,
        processData: false,
        beforeSend: function () {
          $('#form-submit').html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> SUBMITTING...'
          );
          $('#form-submit').attr('disabled', true);
        },
        success: function (response) {
          if (response['success'] == true) {
            $.notify({
              message: response['message']
            }, {
              type: 'success'
            });
            setTimeout(function () {
              location.reload();
            }, 2000);
          } else {
            $.notify({
              message: response['message']
            }, {
              type: 'danger'
            });
          }
          $('#form-submit').html('CHANGE');
          $('#form-submit').attr('disabled', false);
        },
        error: function (jXHR, textStatus, errorThrown) {
          $('#form-submit').html('CHANGE');
          $('#form-submit').attr('disabled', false);
          $.notify({
            message: errorThrown
          }, {
            type: 'danger'
          });
        }
      });
    });


    $('#submitForm1').on('submit', function (e) {
      e.preventDefault();
      $.ajax({
        url: $(this).attr('action') || window.location.pathname,
        type: "POST",
        data: $(this).serialize(),
        dataType: "JSON",
        cache: false,
        processData: false,
        beforeSend: function () {
          $('#form-submit1').html(
            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> SUBMITTING...'
          );
          $('#form-submit1').attr('disabled', true);
        },
        success: function (response) {
          if (response['success'] == true) {
            $.notify({
              message: response['message']
            }, {
              type: 'success'
            });
            setTimeout(function () {
              location.reload();
            }, 2000);
          } else {
            $.notify({
              message: response['message']
            }, {
              type: 'danger'
            });
          }
          $('#form-submit1').html('CHANGE');
          $('#form-submit1').attr('disabled', false);
        },
        error: function (jXHR, textStatus, errorThrown) {
          $('#form-submit1').html('CHANGE');
          $('#form-submit1').attr('disabled', false);
          $.notify({
            message: errorThrown
          }, {
            type: 'danger'
          });
        }
      });
    });
  });
</script>