<?php foreach ($artikels as $artikel) :?>
<div class="artikel">
	<h2>
		<?= anchor("artikel/show/$artikel->id", $artikel->judul) ?>
	</h2>
	<p>
		<?= $artikel->isi ?>
	</p>
	<p>
		<?= anchor("artikel/edit/$artikel->id", 'Edit') ?>
		<?= form_open("artikel/delete") ?>
			<?= form_hidden('id',$artikel->id) ?>
			<?= form_button(['type' => 'submit' , 'content' => 'Hapus']) ?>
		<?= form_close() ?>
	</p>
</div>
<?php endforeach ?>

<div id="jumlah_artikel">
	Jumlah Artikel : <?= $jumlah ?>
</div>
<div id="pagination">
	<?= $pagination ?>
</div>
