<!-- content-wrapper start -->
<div class="content-wrapper">
    <div class="page-header flex-wrap">
        <div class="d-flex flex-wrap mt-md-2 mt-lg-0">
            <a href="/properties/my_properties" class="btn btn-dark btn-sm d-flex align-items-center">
                <i class="fa fa-arrow-circle-o-left pr-2" aria-hidden="true"></i> Página anterior
            </a>
        </div>
        <div class="d-flex flex-wrap mt-md-2 mt-lg-0">
            <a href="/users/destroy_user/" class="btn btn-success btn-sm d-flex align-items-center">
            <i class="fa fa-share pr-2" aria-hidden="true"></i> Compartir inmueble
            </a>
        </div>
    </div>
    <div class="tabs">
    <div class="tab-button-outer">
        <ul id="tab-button">
        <li><a href="#tab01">Resumen</a></li>
        <li><a href="#tab00">Gestor descriptivo</a></li>
        <li><a href="#tab02">Gestor A.C.E.A.</a></li>
        <li><a href="#tab03">Gestor documental</a></li>
        <li><a href="#tab04">Gestor gráfico</a></li>
        </ul>
    </div>
    <div class="tab-select-outer">
        <select id="tab-select">
        <option value="#tab01">Resumen</option>
        <option value="#tab00">Gestor descriptivo</option>
        <option value="#tab02">Gestor A.C.E.A.</option>
        <option value="#tab03">Gestor documental</option>
        <option value="#tab04">Gestor gráfico</option>
        </select>
    </div>
    <div id="tab01" class="tab-contents">
        <h4 class="pt-4">
            Ficha descriptiva 
            <span class="bg-secondary p-1 font-12 rounded text-white">
                <?= $code_rm ?>
            </span>
        </h4>
        <p>
            <span style="font-weight: bold;">
                • Estatus:
            </span>
            <?= $property_data['status_name'] ?>
        </p>
        <p>
            <span style="font-weight: bold;">
                • Creado:
            </span>
            <?= $property_data['created_at'] ?>
        </p>
        <p>
            <span style="font-weight: bold;">
                • Propietario:
            </span>
            <?= $property_data['owner'] ?>
        </p>
        <p>
            <span style="font-weight: bold;">
                • Correo del propietario:
            </span>
            <?= $property_data['owner_mail'] ?>
        </p>
        <p>
            <span style="font-weight: bold;">
                • Teléfono del propietario:
            </span>
            <?= $property_data['owner_phone'] ?>
        </p>
        <p>
            <span style="font-weight: bold;">
                • Caracter:
            </span>
            <?= $property_data['area_type_name'] ?>
        </p>
        <hr>
        <?= view('shared/informative_memories/matriz', ['data' => $property_data]); ?>
    </div>
    
    
    <div id="tab00" class="tab-contents">
        <?= view('shared/form/form_edit'); ?>
    </div>
    <div id="tab02" class="tab-contents">
        <div class="shadow-sm mb-3 bg-white rounded px-3 pt-2 pb-1">
            <h4 class="pt-4">
                A.C.E.A.
            </h4>
            <p>
                El presente gestor actua como un motor para la generación de memorias descriptivas, constituye en gran parte la información visible. 
            </p>
            <div class="container">
            <form action="/properties/my_properties/views/<?= str_replace('RM00', '', $code_rm) ?>" method="post">
                <?= csrf_field() ?>
            <div class="pt-3">
                <h3>Ambientes</h3>
                <div class="row">
                <?php foreach($aceas as $value): ?>
                        <?php if($value['acea'] == 1): ?>
                        <div class="col-md-4">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    value="<?= $value['id_acea'] ?>" 
                                    <?php if(in_array($value['id_acea'], explode(",", $property_data['environments']))): ?>
                                    checked=""
                                    <?php endif; ?>
                                    name="environments[]"> 
                                    <?= $value['name'] ?> <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <?php endif; ?>
                <?php endforeach; ?>
                </div>
            </div>
            <hr>
            <div class="pt-3">
                <h3>Comodidades</h3>
                <div class="row">
                <?php foreach($aceas as $value): ?>
                        <?php if($value['acea'] == 4): ?>
                        <div class="col-md-4">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    value="<?= $value['id_acea'] ?>"
                                    <?php if(in_array($value['id_acea'], explode(",", $property_data['amenities']))): ?>
                                    checked=""
                                    <?php endif; ?>
                                    name="amenities[]"> 
                                    <?= $value['name'] ?>  <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <?php endif; ?>
                <?php endforeach; ?>
                </div>
            </div>
            <hr>
            <div class="pt-3">
                <h3>Exteriores</h3>
                <div class="row">
                <?php foreach($aceas as $value): ?>
                        <?php if($value['acea'] == 5): ?>
                        <div class="col-md-4">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    value="<?= $value['id_acea'] ?>" 
                                    <?php if(in_array($value['id_acea'], explode(",", $property_data['exterior']))): ?>
                                    checked=""
                                    <?php endif; ?>
                                    name="exterior[]"> 
                                    <?= $value['name'] ?>  <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <?php endif; ?>
                <?php endforeach; ?>
                </div>
            </div>
            <hr>
            <div class="pt-3">
                <h3>Adyacencias</h3>
                <div class="row">
                <?php foreach($aceas as $value): ?>
                        <?php if($value['acea'] == 7): ?>
                        <div class="col-md-4">
                            <div class="form-check form-check-primary">
                                <label class="form-check-label">
                                    <input 
                                    type="checkbox" 
                                    class="form-check-input" 
                                    value="<?= $value['id_acea'] ?>" 
                                    <?php if(in_array($value['id_acea'], explode(",", $property_data['adjacencies']))): ?>
                                    checked=""
                                    <?php endif; ?>
                                    name="adjacencies[]"> 
                                    <?= $value['name'] ?>  <i class="input-helper"></i>
                                </label>
                            </div>
                        </div>
                        <?php endif; ?>
                <?php endforeach; ?>
                </div>
            </div>
            <hr>
            <div class="pt-3 pb-2">
                <button type="submit" class="btn btn-success btn-sm w-100">
                    Guardar
                </button>
            </div>
        </form>
        </div>
        </div>
    </div>
    <div id="tab03" class="tab-contents">
    <h4 class="pt-4">
        Toda la documentación legal deberás cargarla en este gestor. 
    </h4>
    <form method="POST" enctype="multipart/form-data" action="/properties/my_properties/views/28">
        <?= csrf_field() ?>
        <div class="input-group mb-3">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="documentary" id="input_documentary">
            <label class="custom-file-label" id="label_documentary" for="documentary">Elija el archivo</label>
        </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm w-100">
            <i class="fa fa-upload pr-2" aria-hidden="true"></i> cargar
        </button>
    </form>
    <div class="row pt-4">
        <?php foreach ($documentarys as $documentary): ?>
        <div class="col-md-4 p-3">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center bg-dark text-white p-5 rounded">
                                <i class="fa fa-file-text pr-2" aria-hidden="true"></i>
                                Documento
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p>
                                Nombre: <?= $documentary ?>
                            </p>
                        </div>
                        <div class="col-md-6 p-0">
                            <a 
                            href="<?= '/properties/'.$code_rm.'/documentary/'.$documentary?>" 
                            class="btn btn-success btn-sm w-100 rounded-0" 
                            download="<?= $documentary ?>">
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-6 p-0">
                            <?= view('shared/destroy_material/destructor_file', [
                                'url_post_destroy' => '/properties/my_properties/views/'.$property_data['id_properties'],
                                'directory_file_destroy' => '/properties/'.$code_rm.'/documentary/'.$documentary
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <?php endforeach; ?>
    </div>
    </div>
    <div id="tab04" class="tab-contents">
        <h4 class="pt-4">
            Todo el contenido gráfico (imágenes) deberás cargarlo en este gestor.
        </h4>
        <form method="POST" enctype="multipart/form-data" action="/properties/my_properties/views/28">
        <?= csrf_field() ?>
        <div class="input-group mb-3">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="graphic" id="input_graphic">
            <label class="custom-file-label" id="label_graphic" for="graphic">Elija el archivo</label>
        </div>
        </div>
        <button type="submit" class="btn btn-success btn-sm w-100">
            <i class="fa fa-upload pr-2" aria-hidden="true"></i> cargar
        </button>
    </form>
    <div class="row pt-4">
        <?php foreach ($graphics as $graphic): ?>
        <div class="col-md-4 p-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="<?= '/properties/'.$code_rm.'/graphic/'.$graphic ?>" class="img-fluid img-property-grid border border-secondary rounded" alt="Responsive image">
                        </div>
                        <div class="col-md-12">
                            <p>
                                Nombre: <?= $graphic ?>
                            </p>
                        </div>
                        <div class="col-md-6 p-0">
                            <a 
                            href="<?= '/properties/'.$code_rm.'/graphic/'.$graphic?>" 
                            class="btn btn-success btn-sm w-100 rounded-0" 
                            download="<?= $graphic ?>">
                                <i class="fa fa-download" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="col-md-6 p-0">
                            <?= view('shared/destroy_material/destructor_file', [
                                'url_post_destroy' => '/properties/my_properties/views/'.$property_data['id_properties'],
                                'directory_file_destroy' => '/properties/'.$code_rm.'/graphic/'.$graphic
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</div>
</div>
<!-- content-wrapper ends -->