<div class="row">
<?php 
helper('url');
helper('filesystem');
foreach($data_catalogue AS $row): 
$files = directory_map(FCPATH.'properties/RM00'.$row['id_properties'].'/graphic/');
?>
    <div class="col-md-12 pt-3 pb-3">
        <div class="shadow-sm mb-3 bg-white rounded">
            <div class="row ">
                <div class="col-md-4">
                    <img src="<?= '/properties/RM00'.$row['id_properties'].'/graphic/' ?><?php if(!empty($files)){echo $files[0];} ?>" class="w-100 image-card-style">
                </div>
                <div class="col-md-8 px-3">
                    <div class="card-block px-3 pt-3">
                    <div class="page-header flex-wrap mb-0">
                        <div class="d-flex flex-wrap">
                            <div class="pt-2">
                                <a class="card-title mb-0" href="/properties/view_property/<?= $row['id_properties'] ?>">
                                    <?= ucwords($row['housingtype_name']) ?> | <?= ucwords($row['address']) ?>
                                </a>
                                <p class="mt-0 mb-3 text-muted">
                                    Municipio <?= ucwords($row['municipality_name']) ?> del <?= $row['state_name'] === 'distrito capital' ? '' : 'Estado' ?> <?= ucwords($row['state_name']) ?>.
                                </p>
                            </div>
                        </div>
                        <div class="d-flex flex-wrap">
                            <span class="bg-dark p-1 font-12 rounded text-white mr-1">
                                Mercado <?= ucwords($row['markettype_name']) ?>
                            </span>
                            <span class="bg-dark p-1 font-12 rounded text-white ml-1">
                                RM00<?= $row['id_properties'] ?>
                            </span>
                        </div>
                    </div>
                    <hr class="mb-1">
                    <p class="card-text mb-0"><i class="text-secondary fa fa-arrows-alt" aria-hidden="true"></i> <?= $row['meters_construction'] ?> m² <i class="text-secondary fa fa-bed pl-3" aria-hidden="true"></i> <?= $row['bedrooms'] ?> hab <i class="text-secondary fa fa-bath pl-3" aria-hidden="true"></i> <?= $row['bathrooms'] ?> Baños <i class="text-secondary fa fa-car pl-3" aria-hidden="true"></i> <?= $row['garages'] ?> Estac.</p>
                    <hr class="mt-1">
                    <p class="card-text">
                        En <?= $row['businessmodel_name'] ?> | $<?= number_format($row['price']) ?>
                    </p>
                    <p class="card-text">
                        Asesor inmobiliario: 
                        <a href="mb-0 h-4">
                            <?= ucwords($row['name_agent']) ?>
                        </a>
                    </p>
                    <div class="row mt-4 mb-2">
                        <div class="col-md-10 px-2 pt-2">
                            <button type="submit" class="btn btn-success btn-sm w-100">
                                <i class="fa fa-whatsapp pr-2" aria-hidden="true"></i> Compartir
                            </button>
                        </div>
                        <div class="col-md-2 px-2 pt-2">
                            <button type="submit" class="btn btn-light border-danger btn-sm w-100">
                                <i class="fa fa-heart text-danger" aria-hidden="true"></i> 
                            </button>
                        </div>
                    </div>
                    </div>
                </div>

                </div>
            </div>
        </div>        
    <?php endforeach; ?>             
</div>
<?= $pager->links() ?>