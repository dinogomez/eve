<?php require_once('admin-security-process/process-lobby.php'); ?>

  <main class="page-content">
    <br><br>
    <div class="container-fluid">
      <h2 style="color:#42daf5">Pending/Awaiting Visitors</h2>
      <hr>
      <div class="row">
        <div class="form-group col-md-12">
          <div class="row">
            <div id="clock" class="col-2" style="font-size:20px"></div>
            <div id="date" class="col-4" style="font-size:20px"></div>
            <div class="col-1">
              <a href="admin-security-dashboard-pending.php" class="btn btn-secondary">Clear Filters</a>
            </div>
            <div class="col-2">
              <form class="" action="admin-security-visitors-guest.php" method="get">
                <select class="form-control" name="purpose" disabled onchange='if(this.value != 0) { this.form.submit(); }'>>
                  <option value="Tour">Tour</option>
                  <option value="Inquiry">Inquiry</option>
                  <option value="Event">Event</option>
                  <option value="Enrollment">Enrollment</option>
                  <option value="Other">Other</option>
                </select>
              </form>
            </div>
            <div class="col-3">
              <form class="" action="admin-security-visitors-pending.php" method="get">
                <input type="search" name="search" class="form-control" placeholder="Search Visitor" disabled>
              </form>
            </div>
          </div>
        </div>

        <hr>

        <div class="alert alert-shadow flex-column align-items-start shadow" role="alert" style="width:100%;">
          <div class="row" style="margin-left:px">
            <div class="col-4">
              <h5 class="mb-1">Name</h5>
            </div>
            <div class="col-2">
              <h5 class="mb-1">Code</h5>
            </div>
            <div class="col-2">
              <h5 class="mb-1">Type</h5>
            </div>
            <div class="col-2">
              <h5 class="mb-1">Action</h5>
            </div>
            <div class="col-1">
              <h5 class="mb-1"></h5>
            </div>
            <div class="col-1">
              <h5 class="mb-1"></h5>
            </div>
          </div>
        </div>

        <div class="form-group flex-column align-items-start shadow col-md-12">
          <?php
            getPendingListing();
           ?>
         </div>
      </div>
      <hr>
  </main>
</div>
