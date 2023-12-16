<?= $this->extend('snippet.php'); ?>
<?= $this->section('content'); ?>

<div class="container mt-4">
        <h1>Sign-Up</h1>
        <form action="<?= base_url('register') ?>" method="post">

        <?php
            if (!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>
                        <?= session()->getFlashdata('fail'); ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <?php
            if (!empty(session()->getFlashdata('success'))): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>
                        <?= session()->getFlashdata('success'); ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="form-group mt-3">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'username') : ""; ?>
                </span>
            </div>
            <div class="form-group mt-3">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
            </div>
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            <div class="form-group mt-3">
                <label for="password">Confrim Password</label>
                <input type="password" class="form-control" name="cpassword" id="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

        Already have an Account <a href="<?= base_url('login') ?>">Sign-in</a>
</div>

<?=  $this->endSection() ?>
