<div class="container-fluid">
	<div class="jumbotron mt-3">
		<form action="<?= base_url('kalkulator/hasil_hitung') ;?>" method="POST">
			<input type="number" name="var1" placeholder=" bilangan pertama . .">
			<input type="number" name="var2" placeholder=" bilangan kedua . .">
			<select name="operasi">
				<option value="kurang" <?= $operasi == 'kurang'?'selected:':'' ;?> >Pengurangan</option>
				<option value="tambah" <?= $operasi == 'tambah'?'selected:':'' ;?> >Penjumlahan</option>
				<option value="bagi" <?= $operasi == 'bagi'?'selected:':'' ;?> >Pembagian</option>
				<option value="kali" <?= $operasi == 'kali'?'selected:':'' ;?> >Perkalian</option>
				<option value="mod" <?= $operasi == 'mod'?'selected:':'' ;?> >Sisa Hasil Bagi</option>
			</select>
			<button type="submit">Hitung</button>
		</form>
		<hr>
		<p>Hasil Perhitungan : <?= $hasil ;?></p>
	</div>
</div>