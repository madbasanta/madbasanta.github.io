<div class="modal fade" id="d_modal" tabindex="-1" role="dialog" aria-labelledby="d_modalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="d_modalTitle">Make Donation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="donation/make" method="POST">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" readonly value="<?= $user->name ?>" class="form-control">
              </div>
            </div>  
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" readonly value="<?= $user->email ?>" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Adoption Start Date</label>
                <input type="text" name="adp_start_date" value="<?= $user->adp_start_date ?>" class="form-control"
                placeholder="yyyy-mm-dd" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Adoption End Date</label>
                <input type="text" name="adp_end_date" value="<?= $user->adp_end_date ?>" class="form-control"
                placeholder="yyyy-mm-dd" required>
              </div>
            </div>
            <div class="col-md-6 offset-md-3">
              <div class="form-group">
                <label class="d-block text-center">Donation Fee</label>
                <input type="numeric" name="pay_amt" value="10" class="form-control text-center" required>
                <input type="hidden" name="user_id" value="<?= $user->id ?>">
              </div>
            </div>
          </div>
          <div class="clearfix text-center">
            <input type="submit" class="btn-primary btn px-5" value="Donate">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>