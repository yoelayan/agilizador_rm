
<div class="content-wrapper">
    <div class="page-header flex-wrap">
        <div class="d-flex flex-wrap mt-md-2 mt-lg-0">
            <a href="<?= $previous_page ?>" class="btn btn-dark btn-sm d-flex align-items-center">
                <i class="fa fa-arrow-circle-o-left pr-2" aria-hidden="true"></i> Página anterior
            </a>
        </div>
        <div class="d-flex flex-wrap mt-md-2 mt-lg-0">
            <?php if($user['email'] !== session()->get('email')): ?>
            <a href="/users/destroy_user/<?= base64_encode($previous_page) ?>/<?= $user['document_ci'] ?>" class="btn btn-danger btn-sm d-flex align-items-center">
            <i class="fa fa-trash pr-2" aria-hidden="true"></i> Eliminar usuario
            </a>
            <?php endif; ?>
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
            <div class="col-sm-8 pr-0 pl-0">
                <div class="card-block">
                <div class="tabs">
                <div class="tab-button-outer">
                    <ul id="tab-button">
                        <li><a href="#tab01">Información personal</a></li>
                        <li><a href="#tab02">Cambiar contraseña</a></li>
                        <li><a href="#tab03">Permisología</a></li>
                    </ul>
                </div>
                <div class="tab-select-outer">
                    <select class="form-control" id="tab-select">
                        <option value="#tab01">Información personal</option>
                        <option value="#tab02">Cambiar contraseña</option>
                        <option value="#tab03">Permisología</option>
                    </select>
                </div>
                <div id="tab01" class="tab-contents border-0">
                    <div class="mb-3 pt-3">
                    <form action="/users/edit_user/<?= base64_encode($previous_page) ?>/<?= $id_user ?>" method="post">
                        <div class="row">
                            <?= csrf_field() ?>
                                <div class="col-sm-12">
                                    <label for="full_name">Nombre y apellido</label>
                                    <input type="text" class="form-control w-100" name="full_name" id="full_name" value="<?= $user['full_name'] ?>" placeholder="Ej: Juan perez" required="">
                                </div>
                            </div>
                        <div class="row pt-3">
                            <div class="col-sm-6 p">
                                <label for="email">Correo electrónico</label>
                                <input type="text" class="form-control w-100" name="email" id="email" value="<?= $user['email'] ?>" placeholder="Ej: uncorreo@tuasesorrm.com.ve" required="">
                            </div>
                            <div class="col-sm-6">
                                <label for="phone">Teléfono</label>
                                <input type="text" class="form-control w-100" name="phone" id="phone" value="<?= $user['phone'] ?>" placeholder="Ej: 4120388680" required="">
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-sm-6">
                                <label for="document_ci">Cédula</label>
                                <input type="text" class="form-control w-100" name="document_ci" id="document_ci" value="<?= $user['document_ci'] ?>" placeholder="Ej: 0000000" required="">
                            </div>
                            <div class="col-sm-6">
                            <label for="rol">Rol de usuario</label>
                            <select class="form-control" name="id_fk_rol">
                                <option>
                                    Seleccionar...
                                </option>
                                <?php foreach ($roles_data as $option): ?>
                                    <option 
                                    value="<?= $option['id'] ?>"
                                    <?php if($option['id'] == $user['id_fk_rol']): ?>
                                        selected=""
                                    <?php endif; ?>
                                    >
                                        <?= ucfirst($option['description']) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                        <div class="row pt-3">
                            <div class="col-sm-6">
                                <label for="document_ci">Código de usuario</label>
                                <input type="text" class="form-control w-100" value="U00<?= $id_user ?>" disabled="">
                            </div>
                            <div class="col-sm-6">
                                <label for="document_ci">Fecha de creación</label>
                                <input type="text" class="form-control w-100" value="<?= $user['created_at'] ?>" disabled="">
                            </div>
                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-success w-100" id="button_submit">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                <div id="tab02" class="tab-contents border-0">
                                <div class="mb-3 pt-3">
                                <form action="/users/edit_user/<?= base64_encode($previous_page) ?>/<?= $id_user ?>" method="post">
                                    <div class="row">
                                        <?= csrf_field() ?>
                                        <div class="col-md-6">
                                            <label for="new-password">Nueva contraseña</label>
                                            <input type="text" class="form-control w-100" name="new-password" id="new-password" onkeyup="confirm_password()" placeholder="******" required="">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="new-password">Confirmar contraseña</label>
                                            <input type="text" class="form-control w-100" name="confirm-password" id="confirm-password" onkeyup="confirm_password()" placeholder="******" required="">
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-success w-100" id="button_submit" disabled>Cambiar contraseña</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                </div>
                <div id="tab03" class="tab-contents border-0">
                  Permisos
                </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>