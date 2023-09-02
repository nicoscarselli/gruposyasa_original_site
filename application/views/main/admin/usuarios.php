<?php
/**
 * @var User[] $users
 * @var User_type[] $user_types
 */
?>

<section class="container">
    <div class="row">
        <div class="col-12">
            <span class="table-title">Usuarios</span>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col text-right">
            <a href="<?= site_url('admin/user_form'); ?>" class="btn">Nuevo</a>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-striped users-table">
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
                                <a href="<?= site_url('admin/user_form/' . $user->id); ?>" class="btn">Editar</a>
								<?php if ($user->user_type == User::USER_TYPE_ADMIN): ?>
									<a href="<?= site_url('admin/user_projects/' . $user->id); ?>" class="btn">Asignar Proyectos</a>
								<?php endif; ?>
                                <a href="#" class="btn delete-btn" data-id="<?= $user->id; ?>">Borrar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
