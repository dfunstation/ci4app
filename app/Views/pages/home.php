<?= $this->extend('template/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-lg-5">
            <h1>Kiki Agustin</h1>
            <p>
                Hallo Namaku Kiki Agustin, saya adalah seorang sofware enginer disalah satu perusahan starup di kota bandung, awal mula saya suka dengan programming dimulai ketika saya masih dibangku kuliah
                <br>
                ada cerita menarik sebenernya dunia IT itu bukan background saya, karena saya kuliah jurusan Akuntansi, saya juga bingung kenapa saya jadi berkarir menjadi seorang programmer
                <br>
                Mungkin emang ini jalan yang allah berikan untuk saya, dan saya selalu bersyukur
            </p>
        </div>
        <div class="col-lg-7">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/GTDVfhOSfKU" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection('content');  ?>