<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4">
			<br><br><br>
			<div class="account-wall"><br>
				<h4 class="text-center" style="margin-top: -10px">DAFTAR</h4><br>
				<img class="profile-img" src="assets/img/photo.png" alt="HILANG">
				<form class="form-signin" action="<?= base_url('auth/regis') ?>" method="post">
				<?= $this->session->flashdata('fail'); ?>
					<div class="form-group">
						<input name="nama" type="text" class="form-control" placeholder="Nama" required autofocus>
					</div>
					<div class="form-group">
						<input name="user" type="text" class="form-control" placeholder="Username" required>
					</div>
					<div class="form-group">
						<input name="pass" type="password" class="form-control" placeholder="Password" required>
					</div>
					<input type="submit" name="regis" value="Daftar" class="btn btn-lg btn-success btn-block">
					<a href="<?= base_url() ?>" class="btn btn-lg btn-primary btn-block">Login</a>
				</form>
			</div>
		</div>
	</div>
</div>