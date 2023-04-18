<?php if(isset($alerts)): ?>
    <?php foreach($alerts as $alert): ?>
    <div class="alert <?= $alert->conf['css'] ?> alert-dismissible fade show mb-0" role="alert">
        <?= $alert->conf['description'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endforeach; ?>
<?php endif; ?>