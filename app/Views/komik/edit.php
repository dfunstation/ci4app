<?= $this->extend('template/template');  ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-2">Edit Data Komik</h2>
            <form action="/Komik/update/<?= $id_komik['id_komik']; ?>" method="POST" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id_komik" value="<?= $id_komik['id_komik'];  ?>">
                <input type="hidden" name="sampulLama" value="<?= $id_komik['sampul']; ?>" id="">
                <div class="form-group row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : '';  ?> " id="judul" name="judul" autofocus value="<?= $id_komik['nama']; ?>">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            <?= $validation->getError('judul'); ?>
                        </div>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="penulis" class="col-sm-2 col-form-label">penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control  " id="penulis" name="penulis" value="<?= $id_komik['penulis']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $id_komik['penerbit']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-2">
                        <img src="/img/<?= $id_komik['sampul']; ?>" class="img-thumbnail img-preview ">
                    </div>
                    <div class="col-sm-8">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input  <?= ($validation->hasError('sampul')) ? 'is-invalid' : ''; ?> " id="sampul" name="sampul" onchange="previewImg()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('sampul'); ?>
                            </div>
                            <label class="custom-file-label" for="sampul"><?= $id_komik['sampul'];  ?></label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit Data Komik</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection();  ?>