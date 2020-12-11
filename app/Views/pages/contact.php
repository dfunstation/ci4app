<?= $this->extend('template/template');  ?>

<?= $this->section('content');  ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2>Contact As</h2>
            <ul>
                <?php foreach ($alamat as $a) :  ?>
                    <li><?= $a['tipe']; ?></li>
                    <li><?= $a['alamat']; ?></li>
                    <li><?= $a['kota']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>
<?= $this->endSection('content');  ?>