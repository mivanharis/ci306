<?= form_open('artikel/create') ?>
	<p>
		<?= form_label('Tanggal','tanggal') ?>
		<?= form_input('tanggal') ?>
	</p>
	<p>
		<?= form_label('Judul','judul') ?>
		<?= form_input('judul') ?>
	</p>
	<p>
		<?= form_label('Isi','isi') ?>
		<?= form_textarea('isi') ?>
	</p>
	<p> Hobi :
		<label> <?= form_checkbox('hobi[]', 'Coding') ?>Coding</label>		
		<label> <?= form_checkbox('hobi[]', 'Membaca') ?>Membaca</label>		
		<label> <?= form_checkbox('hobi[]', 'Hiking') ?>Hiking</label>		
		<label> <?= form_checkbox('hobi[]', 'Gaming') ?>Gaming</label>		
	</p>
	<p>
		<?= form_button(['type'=>'submit', 'content' => 'simpan']) ?>
	</p>
<?= form_close()?>