<style>
    .form-error{
        color: #ff0000; 
        }
</style>
<form action="<?= site_url('tes/create')?>" method="post">
    <div>
        <label>Nama :</label>
        <input type="text" name="nama" value="<?= set_value('nama')?>"/>
        <?= form_error('nama')?>
    </div>
    <div>
        <label>Kelas :</label>
        <select name="kelas">
            <option value="">---Kelas---</option>
            <option value="X-1"><?= set_select('kelas','X-1')?>X-1</option>
            <option value="X-2"><?= set_select('kelas','X-2')?>X-2</option>
            <option value="X-3"><?= set_select('kelas','X-3')?>X-3</option>
        </select>
        <?= form_error('kelas')?>
    </div>
    <div>
        <p>Kelamin :</p>
        <label>
            <input type="radio" name="jenis_kelamin" value="L" <?= set_radio('jenis_kelamin','L')?> />Laki-Laki
        </label>
        <label>
            <input type="radio" name="jenis_kelamin" value="P" <?= set_radio('jenis_kelamin','P')?> />Perempuan
        </label>
        <?= form_error('jenis_kelamin')?>
    </div>
    <div>
        <p>Hobi :</p>
        <label>
            <input type="checkbox" name="hobi[]" value="Olahraga" <?= set_checkbox('hobi[]','Olahraga')?>/>Olahraga
        </label>
        <label>
            <input type="checkbox" name="hobi[]" value="Game" <?= set_checkbox('hobi[]','Game')?>/>Game
        </label>
        <label>
            <input type="checkbox" name="hobi[]" value="Membaca" <?= set_checkbox('hobi[]','Membaca')?>/>Membaca
        </label>
        <?= form_error('hobi[]')?>
    </div>
    <div>
        <button type="submit">Simpan</button>
    </div>
</form>