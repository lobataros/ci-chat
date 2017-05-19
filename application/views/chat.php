<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<br><br><br>
			<div class="account-wall">
				<?= $this->session->flashdata('done'); ?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong><?= $this->session->userdata('nama'); ?></strong>
						<a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-xs pull-right">KELUAR</a>
					</div>
					<div class="panel-body" style="height: 300px; overflow-y: scroll">
					<?php foreach ($chat as $c){ ?>
						<?php if($c->pengirim == $this->session->userdata('user')){ ?>
							<div class="col-md-12">
								<div class="panel panel-success panel-comment pull-right">
									<div class="panel-heading" >
										<strong style="opacity: .5; font-size: 12px; color: #5B57FF">SAYA : &nbsp;&nbsp;&nbsp;</strong>
										<small><?php echo date("d-M-Y H:i:s", strtotime($c->waktu)); ?></small><br/>
										<?= $c->teks ?>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div class="col-md-12">
								<div class="panel panel-primary panel-comment pull-left">
									<div class="panel-heading" >
										<strong style="opacity: .5; font-size: 12px; color: #F5F5F5"><?= $c->pengirim ?>:</strong>
										<small><?php echo date("d-M-Y H:i:s", strtotime($c->waktu)); ?></small><br/>
										<?= $c->teks ?>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
					</div>
				</div>
				<form method="post" action="kirim">
					<div class="col-md-12">
						<div class="input-group">
							<input type="text" name="pesan" class="form-control" placeholder="Masukan Teks">
							<span class="input-group-btn">
								<input class="btn btn-success" type="submit" value="Send">
							</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>