<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url() ?>">Ecommerce App</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?= base_url() ?>">Home</a>
        </li>
        <?php if(session()->user_type == 'admin'): ?>
            <li class="nav-item">
             <a class="nav-link active" aria-current="page" href="<?= base_url('admin/admin_dashboard') ?>">Admin</a>
            </li>
        <?php endif ?>
      </ul>
      <ul class="navbar-nav mb-2 mb-lg-0">
        <?php if (session()->loginned == 'loginned'): ?>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page"
              href="<?= base_url('admin/') ?><?= session()->user_type == "admin" ? "admin_dashboard" : 'user_dashboard' ?>">
              <?= ucfirst(session()->username); ?>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('logout') ?>">Sign-out</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link active" href="<?= base_url('login') ?>">Sign in</a>
          </li>

        <?php endif ?>
      </ul>

    </div>
  </div>
</nav>