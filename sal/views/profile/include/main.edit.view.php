<style>form .text-sm-right{margin-top: 5px;}</style>
<div class="modal fade" id="m_modal" tabindex="-1" role="dialog" aria-labelledby="c_modalTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="c_modalTitle">Edit Your Informations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/edit/main" method="POST" enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-4">
              <div class="text-sm-right"><label>Name</label></div>
            </div>
            <div class="col-sm-7">
              <div>
                <input type="text" name="name" class="form-control" value="<?= $user->name ?>">
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-4">
              <div class="text-sm-right"><label>Email</label></div>
            </div>
            <div class="col-sm-7">
              <div>
                <input type="email" name="email" class="form-control" value="<?= $user->email ?>">
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-4">
              <div class="text-sm-right"><label>Profile Photo</label></div>
            </div>
            <div class="col-sm-7">
              <div>
                <input type="file" name="image" class="form-control">
              </div>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-sm-4">
              <div class="text-sm-right"><label>Password</label></div>
            </div>
            <div class="col-sm-7">
              <div>
                <input type="password" name="password" class="form-control">
              </div>
            </div>
          </div>
          <div class="row mt-3 password d-none">
            <div class="col-sm-4">
              <div class="text-sm-right"><label>New Password</label></div>
            </div>
            <div class="col-sm-7">
              <div>
                <input type="password" name="new_password" class="form-control">
              </div>
            </div>
          </div>
          <div class="row mt-3 password d-none">
            <div class="col-sm-4">
              <div class="text-sm-right"><label>Confirm Password</label></div>
            </div>
            <div class="col-sm-7">
              <div>
                <input type="password" name="c_password" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-10 offset-sm-1">
              <div class="clearfix text-center">
                <button class="btn btn-dark mt-3 float-sm-left change-password">Change Password</button>
                <input id="main-form" type="button" class="btn-primary btn mt-3 float-sm-right" value="Save Change">
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>