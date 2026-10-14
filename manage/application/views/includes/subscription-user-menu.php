<div class="col-lg-3 col-md-3">
  <div class="card">
    <div class="card-content collapse show">
        <div class="list-group">

          <a href="<?php echo site_url('subscriptionusers/userdetails/'.$userdata['id']); ?>" id="8001" class="list-group-item list-group-item-action">Customer Info</a>

          <a href="<?php echo site_url('subscriptionusers/kycdocuments/'.$userdata['id']); ?>" id="8006" class="list-group-item list-group-item-action">KYC Documents</a>

          <a href="<?php echo site_url('subscriptionusers/subscriptionplan/'.$userdata['id']); ?>" id="8002" class="list-group-item list-group-item-action">Subscription Plan</a>

          <a href="<?php echo site_url('subscriptionusers/applicationlist/'.$userdata['id']); ?>" id="8003" class="list-group-item list-group-item-action">Application List</a>

          <a href="<?php echo site_url('subscriptionusers/referrallist/'.$userdata['id']); ?>" id="8004" class="list-group-item list-group-item-action">Referral Customers List</a>

          <a href="<?php echo site_url('subscriptionusers/actions/'.$userdata['id']); ?>" id="8005" class="list-group-item list-group-item-action">Actions</a>

        </div>
    </div>
  </div>
</div>