<div class="card">
    <div class="card-body">
        <h4 class="card-title">
            <?= $datatable['title'] ?>
        </h4>
        <p>
            <?= $datatable['description'] ?>
        </p>
        <hr>
        <table id="<?= $datatable['prefix'] ?>table" class="display w-100">
        <thead>
            <tr>
            <?php foreach ($datatable['header'] as $item): ?>
                <th><?= $item ?></th>
            <?php endforeach ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datatable['data'] as $data): ?>
            <tr>
                <?php foreach ($data as $item): ?>
                    <th style="">
                    <?php if (is_array($item)): ?>
                        <a class="btn btn-primary btn-sm" href="<?= $item['url'].$data[$item['pk']] ?>" role="button">
                            <?= ucfirst($item['button_name']) ?>
                        </a>
                        <?php else: ?>
                            <?= ucfirst($item) ?>
                        <?php endif ?>
                    </th>
                <?php endforeach ?>
            </tr>
            <?php endforeach ?>
        </tbody>
        <tfoot>
            <tr>
            <?php foreach ($datatable['header'] as $item): ?>
                <th><?= $item ?></th>
            <?php endforeach ?>
            </tr>
        </tfoot>
    </table>
    </div>
</div>