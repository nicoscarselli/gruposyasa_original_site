<section class="container">
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?= $error; ?>
        </div>
    <?php endif; ?>

    <?= form_open('', ['id' => 'login-form']); ?>
    <div class="row">
        <div class="col-12 col-md-6 offset-md-3 text-center">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" />
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Login" />
            </div>
        </div>
    </div>
    <?= form_close(); ?>
</section>