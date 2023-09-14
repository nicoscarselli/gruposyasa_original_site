<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= images_folder('header_nosotros.png'); ?>');">
   <div class="container position-relative d-flex flex-column align-items-center">
      <h2>Admin</h2>
   </div>
</div>
<!-- End Breadcrumbs -->

<section class="container">
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <?= form_open('', ['id' => 'login-form']); ?>
    <div class="row justify-content-center">
        <div class="col-lg-4">

            <div class="form-group mb-4">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" />
            </div>

            <div class="form-group mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" />
            </div>

            <div class="form-group">
                <input type="submit" class="btn-primary" value="Login" />
            </div>

        </div>
    </div>
    <?= form_close(); ?>
</section>