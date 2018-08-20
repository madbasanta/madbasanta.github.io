<div class="col-md-6">
	<div class="">
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control" required>
		</div>
		<div class="row">
			<div class="col-md-6 pr-md-1 mb-3">
				<div>
					<label>Date Of Birth</label>
					<input type="text" name="dob" class="form-control"
					placeholder="YYYY-mm-dd" required>
				</div>
			</div>
			<div class="col-md-6 pl-md-1 mb-3">
				<div>
					<label>Gender</label>
					<select name="gender" class="form-control">
						<option value="">-- SELECT --</option>
						<?php foreach(gender() as $gen): ?>
						<option value="<?= $gen ?>"><?= $gen ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 pr-md-1 mb-1">
				<div>
					<label>Password</label>
					<input type="password" name="password" class="form-control" required>
				</div>
			</div>
			<div class="col-md-6 pl-md-1 mb-1">
				<div>
					<label>Confirm Password</label>
					<input type="password" name="c_password" class="form-control" required>
				</div>
			</div>
		</div>
	</div>
</div>