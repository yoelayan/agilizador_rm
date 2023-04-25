<!-- content-wrapper start -->
<div class="content-wrapper">
<?php 
helper('url');
helper('filesystem');
$url_graphic = 'properties/RM00'.$id_property.'/graphic/';
$files = directory_map(FCPATH.$url_graphic);
?>
<div class="pr-2 pl-2 pt-2 pb-2">
    <div class="row">
        <div class="col-md-12 col-xl-12 px-2 pt-2 pb-2"> 
            <div class="shadow-sm mb-3 bg-white rounded px-3 pt-2 pb-1">    
            <div class="page-header flex-wrap mb-0">
                <div class="d-flex flex-wrap">
                    <div class="pt-2">
                        <h4 class="card-title mb-0">
                            <?= ucwords($property_data['housingtype_name']) ?> | <?= ucwords($property_data['address']) ?>
                        </h4>
                        <p class="mt-0 mb-3 text-muted">
                            Municipio <?= ucwords($property_data['municipality_name']) ?> del <?= $property_data['state_name'] === 'distrito capital' ? '' : 'Estado' ?> <?= ucwords($property_data['state_name']) ?>.
                        </p>
                    </div>
                </div>
                <div class="d-flex flex-wrap">
                    <span class="bg-dark p-1 font-12 rounded text-white mr-1">
                        Mercado <?= ucwords($property_data['markettype_name']) ?>
                    </span>
                    <span class="bg-dark p-1 font-12 rounded text-white ml-1">
                        RM00<?= $property_data['id_properties'] ?>
                    </span>
                </div>
            </div>
            </div>
        </div>  
    </div> 

    <div class="row">
            <div class="col-md-9 px-2 pb-2">
                <div class="row">
                    <div class="col-md-12"> 
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <?php foreach ($files as $key => $file): ?>
                                    <?php if (!$file[$key] == 0): ?>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="<?= $key ?>"></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100 img-carrousel-property-adaptative" src="/<?= $url_graphic.$files[0] ?>">
                                </div>
                                <?php foreach ($files as $key => $file): ?>
                                    <?php if (!$file[$key] == 0): ?>
                                        <div class="carousel-item">
                                        <img class="d-block w-100 img-carrousel-property-adaptative" src="/<?= $url_graphic.$file ?>">
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Anterior</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Siguiente</span>
                            </a>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="shadow-sm mb-3 bg-white rounded px-5 pt-2 pb-1">    
                            
                            <div class="d-flex justify-content-between">
                                <p class="card-text mb-0">
                                    <i class="text-secondary fa fa-arrows-alt" aria-hidden="true"></i> <?= $property_data['meters_construction'] ?> m² 
                                </p>
                                <p class="card-text mb-0">
                                    <i class="text-secondary fa fa-bed pl-3" aria-hidden="true"></i> <?= $property_data['bedrooms'] ?> hab 
                                </p>
                                <p class="card-text mb-0">
                                    <i class="text-secondary fa fa-bath pl-3" aria-hidden="true"></i> <?= $property_data['bathrooms'] ?> Baños 
                                </p>
                                <p class="card-text mb-0">
                                    <i class="text-secondary fa fa-car pl-3" aria-hidden="true"></i> <?= $property_data['garages'] ?> Estac.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="shadow-sm mb-3 bg-white rounded px-4 pt-3 pb-3">
                        <?= view('shared/informative_memories/matriz', ['data' => $property_data]); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row no-gutters">
                <div class="col-md-12"> 
                    <div class="card card-stat stretch-card h-100 pt-4 pb-4 shadow-sm rounded">
                        <div class="d-flex flex-column">
                            <div class="mt-4 d-flex justify-content-center">
                                <img 
                                class="img-style-card-user" 
                                src="/assets/images/users/<?php if(!empty($property_data['profile_photo_agent'])): ?><?= $property_data['email_agent'].'/'.$property_data['profile_photo_agent'] ?><?php else:?>default-profile.jpg<?php endif;?>" alt="image" />
                            </div>
                            <div class="mt-3 d-flex justify-content-center font-weight-bold text-white">
                                <h5><?= strtoupper($property_data['name_agent']) ?></h5>
                            </div>
                            <div class="pt-0 d-flex justify-content-center font-weight-light text-secondary text-white">
                                <p>Agente inmobiliario</p>
                            </div>
                        </div>
                        <div class="px-4">
                            <hr class="bg-secondary">
                        </div>
                        <div class="px-3 d-flex justify-content-center">
                            <p class="card-text mb-0 text-white">
                                <i class="text-secondary fa fa-home" aria-hidden="true"></i> 14 propiedades
                            </p>
                        </div>
                        <div class="px-3 pt-4 mb-4">
                            <a href="https://api.whatsapp.com/send?phone=<?= strtoupper($property_data['phone_agent']) ?>&text=Un%20gusto%20colega%20te%20escribo%20por%20la%20siguiente%20propiedad%20RM00<?= $id_property ?>" class="btn btn-success btn-sm w-100">
                                <i class="fa fa-whatsapp pr-2" aria-hidden="true"></i> Contactar
                            </a>
                        </div>
                        <div class="px-3 d-flex justify-content-center">
                            <p class="font-italic font-weight-light text-white">
                                ¡De la mano contigo!
                            </p>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div> 
    </div>
</div>
<!-- content-wrapper ends -->