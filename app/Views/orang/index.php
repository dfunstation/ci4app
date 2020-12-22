<?= $this->extend('template/template');  ?>


<?= $this->section('content');  ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h3 class="mt-3 mb-2">Daftar Orang</h3>
            <form action="" method="POST">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Ketik pencarian anda disini" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" name="submit">cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">nama</th>
                        <th scope="col">alamat</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 + (6 * ($halaman - 1));  ?>
                    <?php foreach ($orang as $o) :  ?>
                        <tr class="isi">
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $o['nama']; ?></td>
                            <td><?= $o["alamat"];  ?></td>
                            <td><a href="" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
            <?= $pager->links('orang', 'orang_pagination'); ?>
        </div>
    </div>
</div>
<?= $this->endSection('content');  ?>