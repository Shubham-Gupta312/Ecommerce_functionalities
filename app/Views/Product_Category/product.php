<?= $this->extend('private_layout.php'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-sm-4 mx-auto">
                <h3>List of Products</h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">S.no</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Create At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($records as $record): ?>
                        <tr>
                            <th scope="row"><?= $record['id'] ?></th>
                            <td><?= $record['name'] ?></td>
                            <td>
                                <img src="<?= base_url('public/images/product_cat/')?><?= $record['image'] ?>" 
                                style="width: 80px; height: 80px; object-fit: cover;"
                                alt="">
                            </td>
                            <td>
                            <?= $record['created_at'] ?>
                            </td>

                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
    </div>


    <?= $this->endSection() ?>