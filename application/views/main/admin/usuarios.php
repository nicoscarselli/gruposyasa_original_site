<?php
/**
 * @var User[] $users
 * @var User_type[] $user_types
 */
?>

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('<?= images_folder('header_oportunidades.png'); ?>');">
    <div class="container position-relative d-flex flex-column align-items-center">
           <h2>Usuarios</h2>
    </div>
</div>
<!-- End Breadcrumbs -->

<section class="container">

    <div class="row mb-5">
        <div class="col text-right">
            <a href="<?= site_url('admin/user_form'); ?>" class="btn btn-primary">Nuevo</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-hover users-table">
                <thead>
                    <tr>
                        <th>E-mail</th>
                        <th>User Type</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user->email; ?></td>
                            <td>
                                <?php foreach ($user_types as $type): ?>
                                    <?php if ($type->id == $user->user_type) echo $type->type; ?>
                                <?php endforeach; ?>
                            </td>
                            <td>
                                <a href="<?= site_url('admin/user_form/' . $user->id); ?>" class="btn btn-secondary">Editar</a>
								<?php if ($user->user_type == User::USER_TYPE_ADMIN): ?>
									<a href="<?= site_url('admin/user_projects/' . $user->id); ?>" class="btn btn-info">Asignar Proyectos</a>
								<?php endif; ?>
                                <a href="#" class="btn btn-danger" data-id="<?= $user->id; ?>">Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
