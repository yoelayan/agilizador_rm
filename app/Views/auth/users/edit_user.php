<div class="content-wrapper">
    <div class="page-header flex-wrap">
        <div class="d-flex flex-wrap mt-md-2 mt-lg-0">
            <a href="/users/super_users" class="btn btn-dark btn-sm d-flex align-items-center">
                <i class="fa fa-arrow-circle-o-left pr-2" aria-hidden="true"></i> Página anterior
            </a>
        </div>
        <div class="d-flex flex-wrap mt-md-2 mt-lg-0">
            <a href="/users/destroy_user/<?= $user['document_ci'] ?>" class="btn btn-danger btn-sm d-flex align-items-center">
            <i class="fa fa-trash pr-2" aria-hidden="true"></i> Eliminar usuario
            </a>
        </div>
    </div>
    <div class="card user-card-full">
        <div class="row m-l-0 m-r-0">
            <div class="col-sm-4 bg-c-lite-green user-profile">
                <div class="card-block text-center text-white">
                    <div class="m-b-25">
                        <img 
                        src="/assets/images/users/<?php if(!empty($user['profile_photo'])): ?><?= $user['email'].'/'.$user['profile_photo'] ?><?php else:?>default-profile.jpg<?php endif;?>" 
                        class="image-user-profile" 
                        alt="User-Profile-Image">
                    </div>
                    <h6 class="f-w-600"><?= $user['full_name'] ?></h6>
                    <p><?= $user['description'] ?></p>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="card-block pt-3">
                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Información personal</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Correo electrónico</p>
                            <h6 class="text-muted f-w-400"><?= $user['email'] ?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Teléfono</p>
                            <h6 class="text-muted f-w-400"><?= $user['phone'] ?></h6>
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Cédula</p>
                            <h6 class="text-muted f-w-400"><?= $user['document_ci'] ?></h6>
                        </div>
                        <div class="col-sm-6">
                            <p class="m-b-10 f-w-600">Fecha de creación</p>
                            <h6 class="text-muted f-w-400"><?= $user['created_at'] ?></h6>
                        </div>
                    </div>
                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Gestor de contraseña</h6>
                    <div class="mb-4">
                    <form action="/users/edit_user/<?= $id_user ?>" method="post">
                        <div class="row">
                            <?= csrf_field() ?>
                            <input type="number" name="document_ci" value="<?= $user['document_ci'] ?>" hidden >
                            <div class="col-md-6">
                                <label for="new-password">Nueva contraseña</label>
                                <input type="text" class="form-control w-100" name="new-password" id="new-password" onkeyup="confirm_password()" placeholder="******" required="">
                            </div>
                            <div class="col-md-6">
                                <label for="new-password">Confirmar contraseña</label>
                                <input type="text" class="form-control w-100" name="confirm-password" id="confirm-password" onkeyup="confirm_password()" placeholder="******" required="">
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-success w-100" id="button_submit" disabled>Aceptar</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>