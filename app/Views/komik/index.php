<?= $this->extend('template/template');  ?>


<?= $this->section('content');  ?>
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <a class="btn btn-primary my-2" href="/komik/create">Tambah Data Komik</a>
            <?php if (session()->getFlashdata('pesan')) :  ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan');  ?>
                </div>
            <?php endif; ?>
            <h3 class="mt-3 mb-2">Daftar Komik</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Sampul</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;  ?>
                    <?php foreach ($komik as $k) :  ?>
                        <tr class="isi">
                            <th scope="row"><?= $i++; ?></th>
                            <td><img src="/img/<?= $k['sampul']; ?>" class="sampul" alt=""></td>
                            <td><?= $k["nama"];  ?></td>
                            <td><a href="/komik/<?= $k["slug"]; ?>" class="btn btn-success">Detail</a></td>
                        </tr>
                    <?php endforeach;  ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection('content');  ?>