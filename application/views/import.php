<div class="container-fluid mt-3">
	<table class="table table-hover table-bordered">
		<tr>
			<td>ID</td>
			<td>Kecamatan</td>
			<td>PP</td>
			<td>ODP</td>
			<td>PDP</td>
			<td>Positif</td>
		</tr>

		<?php foreach ($data_corona as $data_coronas => $d){ ?>
		<tr>
			<td><?= $d['id'] ;?></td>
			<td><?= $d['kecamatan'] ;?></td>
			<td><?= $d['pp'] ;?></td>
			<td><?= $d['odp'] ;?></td>
			<td><?= $d['pdp'] ;?></td>
			<td><?= $d['positif'] ;?></td>
		</tr>
		<?php } ?>
	</table>

	<div class="mt-3">
		<form method="post" action="<?= base_url('excel/unggah') ;?>" enctype="multipart/form-data">
			<div class="form-group">
				<input type="file" name="file" class="form-control-file">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Upload</button>
			</div>
		</form>
	</div>
</div>