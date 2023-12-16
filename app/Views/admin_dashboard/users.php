
<?= $this->extend('snippet.php'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <h2 class="mt-4">List of Registered User's</h2>
    <table class="table table-bordered table-info mt-4">
        <thead>
            <tr>
                <th scope="col">S.no</th>
                <th scope="col">Username</th>
                <th scope="col">Email-Id</th>
                <th scope="col">Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) :?>
            <tr>
                <th scope="row"><?= $user['id'] ?></th>
                <td><?= $user['username'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['created_at'] ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>

<?= $this->endSection() ?>
