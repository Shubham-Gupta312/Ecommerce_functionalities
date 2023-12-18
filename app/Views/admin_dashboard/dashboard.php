<?= $this->extend('snippet.php'); ?>
<?= $this->section('content'); ?>

<div class="container mt-3">
<h2>Welcome to Admin dashboard!</h2>
<div class="row">
    <div class="col-sm-2 mt-3">
        <div class="list-group">
            <a href="<?= base_url('users') ?>">
                <button type="button" class="btn btn-dark">Users</button>
            </a>
        </div>
    </div>
    <div class="col-sm-8">
    
    </div>
</div>
</div>

<?= $this->endSection() ?>