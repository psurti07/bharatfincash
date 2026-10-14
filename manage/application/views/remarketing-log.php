<?php
include_once(APPPATH . 'views/includes/header.php');
?>
<script type="text/javascript">
  window.onload = function() {
    document.getElementById("123").className += " active";
  }
</script>

<div class="content-header row">
  <div class="content-header-left col-md-6 col-12 mb-1">
    <h1 class="content-header-title text-uppercase">Remarketing Log Details</h1>
  </div>
</div>

<div class="content-body">
  <section id="configuration">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="m-2">
            <?php echo form_open('site/remarketinglog', array('id' => 'filterForm', 'class' => 'form-horizontal', 'novalidate' => 'novalidate')); ?>
            <fieldset class="form-group row mb-0">
              <div class="col-md-4">
                SMS:
                <select name="parentid" id="parentid" class="input-sm form-control" required>
                  <option value="1" <?php echo ($parentid == 1) ? 'selected' : ''; ?>>Digital Loan</option>
                  <option value="2" <?php echo ($parentid == 2) ? 'selected' : ''; ?>>Digital whatsapp</option>
                  <option value="13" <?php echo ($parentid == 13) ? 'selected' : ''; ?>>Intrekt whatsapp</option>
                  <option value="3" <?php echo ($parentid == 3) ? 'selected' : ''; ?>>Bharatfincash SMS</option>
                  <option value="14" <?php echo ($parentid == 14) ? 'selected' : ''; ?>>Bharatfincash Intrekt</option>
                </select>
              </div>

              <div class="col-md-3">
                From: <input name="dt_to" type="date" class="input-sm form-control" id="datepicker" value="<?php echo $dt_to; ?>" style="display: inline;" />
              </div>

              <div class="col-md-3">
                To: <input name="dt_from" type="date" class="input-sm form-control" id="datepicker1" value="<?php echo $dt_from; ?>" style="display: inline;" />
              </div>

              <div class="col-md-2">
                <button class="btn btn-outline-primary btn-sm mt-2" name="submit" type="submit">Show</button>
              </div>
            </fieldset>
            <?php echo form_close(); ?>
          </div>
          <div class="card-content collapse show">
            <div class="card-body card-dashboard">
              <table class="table table-bordered table-sm dataex-res-configuration">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Message For</th>
                    <th>Job Name</th>
                    <th>Messages</th>
                    <th>Details</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (count($smsloglist)) {
                    $cnt = 1;
                    foreach ($smsloglist as $row) {
                      echo "<tr>";
                      echo "<td width='50'>" . htmlentities($cnt) . "</td>";
                      echo "<td>" . DateFormatDisplay($row->rec_date) . "</td>";
                      echo "<td>" . htmlentities($row->crontype) . "</td>";
                      echo "<td>" . htmlentities($row->cronname) . "</td>";
                      echo "<td>" . htmlentities($row->msgcount) . "</td>";
                      echo "<td class='text-center' width='50'>" . anchor("site/logdetails/{$row->id}", '<i class="la la-info"></i>', 'class="btn btn-icon btn-outline-dark btn-sm"') . "</td>";

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