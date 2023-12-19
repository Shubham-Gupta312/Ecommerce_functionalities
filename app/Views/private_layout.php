<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= $this->include('bootstrap') ?>
    <title>Ecommerce App</title>
</head>

<body>
    <?= $this->include('header') ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
            <h2>Welcome to Admin dashboard!</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 m-3">
                <div class="list-group">
                    <a href="<?= base_url('admin/users') ?>">
                        <button type="button" class="btn btn-dark">Users</button>
                    </a>
                    <a href="<?= base_url('admin/product_categories') ?>">
                        <button type="button" class="btn btn-dark mt-3">Product Categories</button>
                    </a>
                    <a href="<?= base_url('admin/products') ?>">
                        <button type="button" class="btn btn-dark mt-3">Product</button>
                    </a>
                </div>
            </div>
            <div class="col-sm-10">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>