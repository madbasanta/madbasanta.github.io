<div class="modal fade" id="a_modal" tabindex="-1" role="dialog" aria-labelledby="c_modalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="c_modalTitle">Edit Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/edit/address" method="POST">
          <div class="row">
            <div class="col-md-6 pr-md-1 mb-3">
              <div>
                <label>Country</label>
                <input type="text" name="country" class="form-control" value="<?= $user->country ?>">
              </div>
            </div>
            <div class="col-md-6 pl-md-1 mb-3">
              <div>
                <label>Locality</label>
                <input type="text" name="locality" class="form-control" value="<?= $user->locality ?>">
              </div>
            </div>
            <div class="col-md-6 pr-md-1 mb-2">
              <div>
                <label>Region</label>
                <input type="text" name="region" class="form-control" value="<?= $user->region ?>">
              </div>
            </div>
            <div class="col-md-6 pl-md-1 mb-2">
              <div>
                <label>Postal Code</label>
                <input type="text" name="postal_code" class="form-control" value="<?= $user->postal_code ?>">
              </div>
            </div>
            <div class="col-md-6 pr-md-1 mb-2">
              <div>
                <label>PostBox Number</label>
                <input type="text" name="postbox_no" class="form-control" value="<?= $user->postbox_no ?>">
              </div>
            </div>
            <div class="col-md-6 pl-md-1 mb-2">
              <div>
                <label>Street Address</label>
                <input type="text" name="street_add" class="form-control" value="<?= $user->street_add ?>">
              </div>
            </div>
          </div>
          <div class="clearfix text-right">
            <input type="reset" class="btn-secondary btn mt-2" value="Reset">
            <input type="submit" class="btn-primary btn mt-2" value="Save Change">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>