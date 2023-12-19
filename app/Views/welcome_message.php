<?= $this->extend('snippet.php'); ?>
<?= $this->section('content'); ?>

<h1>Hello, This is Home page</h1>
<!-- <img src=" base_url('public/images/cat.webp') " alt=""> -->
<div class="container d-flex flex-row">
    <?php foreach ($records as $record): ?>
    <div class="card m-3" style="width: 18rem;">
            <div class="card-body">
                <img src="<?= base_url('public/images/product_cat/') ?><?= $record['image'] ?>" style="height:120px; width:120px; object-fit: cover" alt="">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $record['name'] ?>
                    </h5>
                </div>
            </div>
        </div>
        <?php endforeach ?>
</div>

<?= $this->endSection() ?>