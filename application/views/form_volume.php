<div class="container">
	<div class="jumbotron mt-3">
		<h1>Latihan/Tugas PWL 2</h1>
		<p class="lead">Membuat aplikasi web sederhana untuk mengukur volume bangun ruang,</p>
		<br>
		<form action="<?= base_url('Volume/hasil_hitung') ;?>" method="POST">
			<div class="row">
				<div class="col">
					<label>Mau ngitung volume apa?</label>
					<div class="form-group">
						<select name="operasi" class="custom-select" id="operasi">
							<option class="selected"> -- Pilih Bangun Ruang -- </option>
							<option value="tabung" <?= $operasi == 'tabung'?'selected:':'' ;?> >Volume Tabung</option>
							<option value="bola" <?= $operasi == 'bola'?'selected:':'' ;?> >Volume Bola</option>
							<option value="kubus" <?= $operasi == 'kubus'?'selected:':'' ;?> >Volume Kubus</option>
							<option value="balok" <?= $operasi == 'balok'?'selected:':'' ;?> >Volume Balok</option>
							<option value="prisma" <?= $operasi == 'prisma'?'selected:':'' ;?> >Volume Prisma Segitiga</option>
							<option value="limas" <?= $operasi == 'limas'?'selected:':'' ;?> >Volume Limas Segiempat</option>
						</select>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="var1">*Jari-jari / Rusuk / Panjang</label>
						<input type="number" name="var1" id="var1" class="form-control" value="<?= $var1 ;?>">
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="var2">*Lebar</label>
						<input type="number" name="var2" id="var2" class="form-control" value="<?= $var2 ;?>"
						<?php if ($this->uri->segment(1) == 'tabung') {
							echo 'readonly="readonly"';
						}?> >
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="var3">*Tinggi</label>
						<input type="number" name="var3" id="var3" class="form-control" value="<?= $var3 ;?>">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Hasil Perhitungan</label>
						<input class="form-control" value="<?= $hasil ;?>"></input>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<button type="submit" class="btn btn-primary">Hitung</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>