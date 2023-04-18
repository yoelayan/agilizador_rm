

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