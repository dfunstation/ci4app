<?= $this->extend('template/template'); ?>


<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hello, world!</h1>

            <h3>Youtube Saya</h3>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
            </div>

        </div>
    </div>
</div>
<?= $this->endsection('content');  ?>