<!-- content-wrapper start -->
<div class="content-wrapper pb-0">

<?php if ($generate_form['controls']['is_controls']): ?>
    <div class="page-header flex-wrap">
        <div class="d-flex flex-wrap mt-md-2 mt-lg-0">
            <a href="<?= $generate_form['controls']['url_previous_page'] ?>" class="btn btn-dark btn-sm d-flex align-items-center">
                <i class="fa fa-arrow-circle-o-left pr-2" aria-hidden="true"></i> Página anterior
            </a>
        </div>
        <div class="d-flex flex-wrap mt-md-2 mt-lg-0"></div>
    </div>
<?php endif; ?>

<div class="shadow-sm mb-3 bg-white rounded px-3 pt-2 pb-1">
<h4 class="pt-4 pb-4">
    <?= $generate_form['title'] ?>
</h4>
<form action="<?= $generate_form['urlPost'] ?>" method="post">
    <?= csrf_field() ?>
    <input type="text" hidden="" name="form_edit" value="form_edit">
    <?php foreach ($generate_form['data'] as $item): ?>
        <?php if ($item['type'] === 'select'): ?>
        <div class="form-group">
            <label for="<?= $item['name'] ?>"><?= $item['label'] ?></label>
            <select class="form-control" name="<?= $item['name'] ?>">
                <option>
                    Seleccionar...
                </option>
                <?php foreach ($item['options_model'] as $option): ?>
                    <option 
                    value="<?= $option['id'] ?>"
                    <?php if($option['name'] == $generate_form['model_form'][$item['selected']]): ?>
                        selected=""
                    <?php endif; ?>
                    >
                        <?= ucfirst($option['name']) ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>
        <?php else: ?>
            <div class="form-group">
                <label for="<?= $item['name'] ?>"><?= $item['label'] ?></label>
                <input type="<?= $item['type'] ?>" class="form-control form-control-sm rounded" name="<?= $item['name'] ?>" placeholder="<?= $item['placeholder'] ?>" value="<?= $generate_form['model_form'][$item['name']] ?>" required="">
            </div>
        <?php endif; ?>
    <?php endforeach ?>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success w-100">Guardar</button>
    </div>
</form>
</div>
</div>
<!-- content-wrapper ends -->