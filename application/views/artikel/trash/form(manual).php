<form action="<?php site_url('artikel/create') ?>">
	<p>
		<label  for="tanggal">Tanggal</label>
		<input  name="tanggal" id="tanggal" type="text" />
	</p>
	<p>
		<label  for="judul">Judul</label>
		<input  name="judul" id="judul" type="text" />
	</p>
	<p>
		<label  for="isi">Judul</label>
		<textarea  name="isi" id="isi" cols="30" rows="10">
		</textarea>
	</p>
	<p>
		<button type="submit">Simpan</button>
	</p>
</form>