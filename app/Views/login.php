<?= $this->extend('snippet.php') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
        <h1>Sign-In</h1>
        <form action="<?= base_url('login') ?>" method="post">
            <div class="form-group mt-3">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                    placeholder="Enter email">
                 </div>
            <div class="form-group mt-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
            
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>

        Create account <a href="<?= base_url('register') ?>">Sign-up</a>
</div>


<?= $this->endSection() ?>