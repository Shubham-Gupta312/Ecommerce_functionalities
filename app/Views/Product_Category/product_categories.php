<?= $this->extend('private_layout.php'); ?>
<?= $this->section('content'); ?>

<div class="row">
    <div class="col-sm-4 mx-auto">

    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('admin/product_categories')?>" method="post" enctype="multipart/form-data">
            <div class="mb-2">
                <h3>Add Product Category</h3>
            </div>    
            <div class="mb-2">
                    <label for="">Category Name:</label>
                    <input type="text" name="name" class="form-control" value="<?= old("name") ?>">
                </div>

                <div class="mb-2">
                    <label for="">Category Image:</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="mb-2">
                    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                </div>
            </form>
        </div>
    </div>

    </div>
</div>

<?= $this->endSection() ?>