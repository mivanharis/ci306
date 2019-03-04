<style type="text/css">
	.form-error{
		color: #ff0000;
	}
</style>
<?= form_open($form_action) ?>
	<p>
		<?= form_label('Tanggal : ','tanggal') ?>
		<?= form_input('tanggal',$input->tanggal) ?>
		<?= form_error('tanggal') ?>
	</p>
	<p>
		<?= form_label('Judul','judul') ?>
		<?= form_input('judul',$input->judul) ?>
		<?= form_error('judul') ?>
	</p>
	<p>
		<?= form_label('Isi','isi') ?>
		<?= form_textarea('isi',$input->isi) ?>
		<?= form_error('isi') ?>
	</p>
	<p>
		<?= form_button(['type'=>'submit', 'content' => 'simpan']) ?>
	</p>
<?= form_close()?>