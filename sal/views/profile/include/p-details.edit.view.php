<div class="modal fade" id="p_modal" tabindex="-1" role="dialog" aria-labelledby="c_modalTitle" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="c_modalTitle">Edit Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/edit/personal-details" method="POST">
          <div class="form-group">
            <label for="dob">Date Of Birth</label>
            <input type="text" id="dob" name="dob" class="form-control" 
            placeholder="yyyy-mm-dd" value="<?= $user->dob ?>">
          </div>
          <div class="form-group">
            <label>Gender</label>
            <select name="gender" class="form-control">
              <?php foreach(gender() as $gen): ?>
              <option value="<?= $gen ?>" <?= ($user->gender == $gen)?"selected": "" ?>><?= $gen ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="clearfix text-right">
            <input type="reset" class="btn-secondary btn" value="Reset">
            <input type="submit" class="btn-primary btn" value="Save Change">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>