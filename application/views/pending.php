<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<br><br><br>
			<div class="panel panel-default">
				<?php foreach($status as $s): ?>
				<div class="panel-heading">
					<strong><?= $this->session->userdata('nama'); ?></strong>
					<a href="<?= base_url('auth/logout') ?>" class="btn btn-danger btn-xs pull-right">KELUAR</a>
					<?php 
						if ($this->session->userdata('akses') == 'ADMIN') {
							echo "<a href=".base_url('chat')." class=\"btn btn-primary btn-xs\" title=\"User Perlu Persetujuan\"><i class=\"glyphicon glyphicon-comment\"></i> Chatbox</a>";
							if($s->status == TRUE) {
								echo "<a href=".base_url('chat/maintenance')." class=\"btn btn-warning btn-xs\" title=\"Disable Chat\"><i class=\"glyphicon glyphicon-lock\"></i> Maintenance</a>";
							} else {
								echo "<a href=".base_url('chat/open')." class=\"btn btn-success btn-xs\" title=\"Enable Chat\"><i class=\"glyphicon glyphicon-ok\"></i> Buka Chat</a>";
							}
						}
					?>
				</div>
				<?php endforeach ?>
				<div class="panel-body" style="height: 300px; overflow-y: scroll">
					<table class="table table-condensed">
						<thead>
							<th>No</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Password</th>
							<th>Aksi</th>
						</thead>
						<?php $i=1; foreach($orang->result() as $o): ?>
						<tbody>
							<td><?= $i++ ?></td>
							<td><?= $o->nama ?></td>
							<td><?= $o->user ?></td>
							<td><?= $o->pass ?></td>
							<td> 
								<?php
									if ($o->status == TRUE) {
										echo "<a href=".base_url("chat/pending/nonaktif/$o->user")." class=\"btn btn-xs btn-warning\" title=\"Nonaktifkan\"><i class=\"glyphicon glyphicon-warning-sign\"></i></a>";
									} else {
										echo "<a href=".base_url("chat/pending/aktif/$o->user")." class=\"btn btn-xs btn-success\" title=\"Aktifkan\"><i class=\"glyphicon glyphicon-check\"></i></a>";
									}
								?>
								
								
								<a href="<?= base_url("chat/pending/hapus/$o->user") ?>" class="btn btn-xs btn-danger" title="Hapus"><i class="glyphicon glyphicon-trash"></i></a>
							</td>
						</tbody>
						<?php endforeach ?>
					</table>
				</div>
				<div class="panel-footer">
					<strong>Jumlah User : <?= $orang->num_rows() ?></strong>
				</div>
			</div>
		</div>
	</div>
</div>