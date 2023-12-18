<?= $this->extend('snippet.php'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col-sm-10">
            <h2 class="mt-4">User Dashboard</h2>
        </div>
        <div class="col-sm-2 mt-4">
            <a href="<?= base_url('profile') ?>"><button class="btn btn-info">Edit Profile</button></a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>