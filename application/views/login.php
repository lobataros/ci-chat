<div class="container">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-md-offset-4">
			<br><br><br>
			<div class="account-wall"><br>
				<h4 class="text-center" style="margin-top: -10px">LOGIN</h4><br>
				<img class="profile-img" src="assets/img/photo.png" alt="HILANG">
				<form class="form-signin" action="<?= base_url('auth/login') ?>" method="post">
				<?= $this->session->flashdata('gagal'); ?>
				<?= $this->session->flashdata('login'); ?>
				<?= $this->session->flashdata('scc'); ?>
					<div class="form-group">
						<input name="user" type="text" class="form-control" placeholder="Username" required autofocus>
					</div>
					<div class="form-group">
						<input name="pass" type="password" class="form-control" placeholder="Password" required>
					</div>
					<input type="submit" name="login" value="Login" class="btn btn-lg btn-primary btn-block">
				<a href="<?= base_url('register') ?>" class="btn btn-lg btn-success btn-block">Daftar</a>
				</form>
			</div>
		</div>
	</div>
</div>