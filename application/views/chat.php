<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<br><br><br>
				<?= $this->session->flashdata('done'); ?>
				<div class="panel panel-default">
					<?php foreach($status as $s): ?>
					<div class="panel-heading">
						<strong><?= $this->session->userdata('nama'); ?></strong>
						<a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-xs pull-right">KELUAR</a>
						<?php 
							if ($this->session->userdata('akses') == 'ADMIN') {
								echo "<a href=".base_url('chat/pending')." class=\"btn btn-primary btn-xs\" title=\"User Perlu Persetujuan\"><i class=\"glyphicon glyphicon-user\"></i> User Pending</a>";
								if($s->status == TRUE) {
									echo "<a href=".base_url('chat/maintenance')." class=\"btn btn-warning btn-xs\" title=\"Disable Chat\"><i class=\"glyphicon glyphicon-lock\"></i> Maintenance</a>";
								} else {
									echo "<a href=".base_url('chat/open')." class=\"btn btn-success btn-xs\" title=\"Enable Chat\"><i class=\"glyphicon glyphicon-ok\"></i> Buka Chat</a>";
								}
							}
						?>
					</div>
					<?php endforeach ?>
					<?php if ($s->status == TRUE): ?>
					<div class="panel-body" style="height: 300px; overflow-y: scroll">
					<?php foreach ($chat as $c){ ?>
						<?php if($c->pengirim == $this->session->userdata('user')){ ?>
							<div class="col-md-12">
								<div class="panel panel-success panel-comment pull-right">
									<div class="panel-heading" >
										<strong style="opacity: .5; font-size: 12px; color: #4BD239">SAYA : &nbsp;&nbsp;&nbsp;</strong>
										<small><?php echo date("d-M-Y H:i:s", strtotime($c->waktu)); ?></small><br/>
										<?= $c->teks ?>
									</div>
								</div>
							</div>
						<?php } else { ?>
							<div class="col-md-12">
								<div class="panel panel-warning panel-comment pull-left">
									<div class="panel-heading" >
										<strong style="opacity: .5; font-size: 12px; color: #DCD15B"><?= $c->pengirim ?>:</strong>
										<small><?php echo date("d-M-Y H:i:s", strtotime($c->waktu)); ?></small><br/>
										<?= $c->teks ?>
									</div>
								</div>
							</div>
						<?php } ?>
					<?php } ?>
					</div>
					<?php endif ?>
					<?php if ($s->status == FALSE): ?>
					<div class="panel-body">
						<h4 class="text-center" style="color: #FF0000">MOHON MAAF<br>SERVER SEDANG MAINTENANCE<br><br>SILAHKAN KEMBALI BEBERAPA SAAT</h4>
					</div>
					<?php endif ?>
				</div>
				<?php if ($s->status == TRUE): ?>
					<div class="row">
						<div class="col-md-12 ">
							<form method="post" action="chat/kirim">
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
				<?php endif ?>
		</div>
	</div>
</div>