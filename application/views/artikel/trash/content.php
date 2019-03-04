<div id="content">
	<?php foreach ($artikel as $row) : ?>
	<h2>
		<?= $row['judul'] ?>
	</h2>
	<p>
		<?= $row['isi'] ?>
	</p>
	<?php endforeach ?>	
	<p>
		Jumlah Artikel : <?= $jumlah ?>
	</p>
</div>

<div id="pagination">
	<p>
		<?= $pagination ?>	
	</p>
</div>