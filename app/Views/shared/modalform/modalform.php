
<div class="header-right ">
    <button type="button" class="btn btn-primary mt-2 mt-sm-0 btn-icon-text" data-toggle="modal" data-target="#<?= $modalform['prefix'] ?>">
        <i class="mdi mdi-plus-circle"></i> <?= $modalform['title'] ?>
    </button>
</div>
<!-- Modal -->
<div class="modal fade" id="<?= $modalform['prefix'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> <?= $modalform['title'] ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form action="<?= $modalform['urlPost'] ?>" method="post">
            <?= csrf_field() ?>
            <?php foreach ($modalform['data'] as $item): ?>
                <?php if ($item['type'] === 'select'): ?>
                <div class="form-group">
                    <label for="<?= $item['name'] ?>"><?= $item['label'] ?></label>
                    <select class="form-control" name="<?= $item['name'] ?>">
                        <option>
                            Seleccionar...
                        </option>
                        <?php foreach ($item['options_model'] as $option): ?>
                            <option value="<?= $option['id'] ?>">
                                <?= ucfirst($option['name']) ?>
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <?php else: ?>
                    <div class="form-group">
                        <label for="<?= $item['name'] ?>"><?= $item['label'] ?></label>
                        <input type="<?= $item['type'] ?>" class="form-control form-control-sm rounded" name="<?= $item['name'] ?>" placeholder="<?= $item['placeholder'] ?>" required="">
                    </div>
                <?php endif; ?>
            <?php endforeach ?>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success w-100">Aceptar</button>
                <button type="button" class="btn btn-dark w-100" data-dismiss="modal">Cancelar</button>
            </div>
        </form>
        </div>
        </div>
    </div>
</div>