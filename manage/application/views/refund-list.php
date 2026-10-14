<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
  window.onload = function() {
    document.getElementById("139").className += " active";
  }
</script>

<div class="content-header row">
  <div class="content-header-left col-md-6 col-12 mb-1">
    <h1 class="content-header-title text-uppercase">Refund</h1>
  </div>
  <div class="content-header-right col-md-6 col-12 mb-1">
    <?php echo form_open('account/refund', array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
    <fieldset class="form-group text-center">
      From: <input name="dt_to" type="date" class="input-sm form-control col-md-4" id="datepicker" value="<?php echo $dt_to; ?>" style="display: inline;" />
      &nbsp; &nbsp;
      To: <input name="dt_from" type="date" class="input-sm form-control col-md-4 mb-1" id="datepicker1" value="<?php echo $dt_from; ?>" style="display: inline;" />
      &nbsp; &nbsp;
      <button class="btn btn-outline-primary btn-sm show-btn" name="submit" type="submit">Show</button>
    </fieldset>
    <?php echo form_close(); ?>
  </div>
</div>


<div class="content-body">
  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">

          <!-- <div class="card-header">
            <div class="heading-elements">

            </div>
          </div> -->

          <div class="card-content collapse show">
            <div class="card-body">
              <table class="table table-striped table-bordered table-sm responsive dataex-html5-export">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Refund Date</th>
                    <th>Ref #</th>
                    <th>Fullname</th>
                    <th>Mobile</th>
                    <th class='text-right'>Total Amount</th>
                    <th>Payment Id</th>
                    <th>Remarks</th>
                    <th>Delete</th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  if (count($datalist)) {
                    $cnt = 1;
                    foreach ($datalist as $row) {
                      echo "<tr>";

                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";

                      echo "<td>" . displayDate($row['ref_date']) . "</td>";

                      echo "<td>" . $row['ref_number'] . "</td>";

                      echo "<td>";
                      if ($row['ref_for'] == 1 || $row['ref_for'] == 2) {
                        echo anchor("users/userdetails/{$row['userid']}", $row['fullname'], 'class="text-capitalize"');
                      } 
                      echo "</td>";

                      echo "<td>" . htmlentities($row['mobile']) . "</td>";

                      echo "<td class='text-right'>" . formatePriceIndia($row['ref_grandtotal']) . "</td>";

                      echo "<td>" . htmlentities($row['paymentid']) . "</td>";

                      echo "<td>" . htmlentities($row['remarks']) . "</td>";

                      echo "<td class='text-center' width='50'>" . anchor("account/deleterefund/{$row['id']}", '<i class="la la-trash"></i>', 'class="btn btn-icon btn-outline-danger btn-sm"') . "</td>";

                      echo "</tr>";
                      $cnt++;
                    }
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
include_once(APPPATH . 'views/includes/footer.php');
?>