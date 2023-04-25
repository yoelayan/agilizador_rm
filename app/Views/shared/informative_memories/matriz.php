<div>
    <div class="pt-2">
        <h5>
            Asesores RM  
            ofrece <?= $data['housingtype_name'] ?> en <?= $data['businessmodel_name'] ?>, ubicado en <?= ucwords($data['address']) ?>, 
            Municipio <?= ucwords($data['municipality_name']) ?> del <?= $data['state_name'] === 'distrito capital' ? '' : 'Estado' ?> <?= ucwords($data['state_name']) ?>.
        </h5> 
    </div>
    
    <hr>
    
    <div class="pt-3">
        <h6>
            • La propiedad tiene <?= $data['meters_construction'] ?> m² de construcción 
            <?php if($data['meters_land'] > 1): ?>
                sobre un terreno de <?= $data['meters_land'] ?> m²
            <?php endif; ?>
            distribuidos en: 
        </h6>
        <ul>
            <li class="list-group">
                - <?= $data['bedrooms'] ?> <?= $data['bedrooms'] > 1 ? 'Habitaciones' : 'Habitacion'?>.
            </li>
            <li class="list-group">
                - <?= $data['bathrooms'] ?> <?= $data['bathrooms'] > 1 ? 'Baños' : 'Baño'?>.
            </li>
            <?php foreach($aceas as $value): ?>
                <?php if($value['acea'] == 1): ?>
                    <?php if(in_array($value['id_acea'], explode(",", $property_data['environments']))): ?>
                    <li class="list-group">
                        - <?= ucfirst($value['name']) ?>.
                    </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <hr>
    
    <div class="pt-3">
        <h6>
            • Comodidades del inmueble:
        </h6>
        <ul>
            <?php foreach($aceas as $value): ?>
                <?php if($value['acea'] == 4): ?>
                    <?php if(in_array($value['id_acea'], explode(",", $property_data['amenities']))): ?>
                    <li class="list-group">
                        - <?= ucfirst($value['name']) ?>.
                    </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <hr>
    
    <div class="pt-3">
        <h6>
            • Exteriores del inmueble: 
        </h6>
        <ul>
            <?php foreach($aceas as $value): ?>
                <?php if($value['acea'] == 5): ?>
                    <?php if(in_array($value['id_acea'], explode(",", $property_data['exterior']))): ?>
                    <li class="list-group">
                        - <?= ucfirst($value['name']) ?>.
                    </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <hr>
    
    <div class="pt-3">
        <h6>
            • Adyacencias del inmueble: 
        </h6>
        <ul>
            <?php foreach($aceas as $value): ?>
                <?php if($value['acea'] == 7): ?>
                    <?php if(in_array($value['id_acea'], explode(",", $property_data['adjacencies']))): ?>
                    <li class="list-group">
                        - <?= ucfirst($value['name']) ?>.
                    </li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    
    <hr>
    
    <div>
        <p>
            <span style="font-weight: bold;">
                • Estacionamiento:
            </span> 
            <?= $data['garages'] ?> <?= $data['garages'] > 1 ? 'puestos' : 'puesto'?>.
        </p>
    </div>
    <div>
        <p>
            <span style="font-weight: bold;">
                • Código:
            </span> 
            RM00<?= $data['id_properties'] ?>
        </p>
    </div>
    <div>
        <p>
            <span style="font-weight: bold;">
                • Precio de <?= $data['businessmodel_name'] ?>:
            </span> 
            $<?= number_format($data['price']) ?>
        </p>
    </div>
    <div>
        <p>
            <span style="font-weight: bold;">
                • Agente:
            </span>
            <?= $data['name_agent'] ?>
        </p>
    </div>
</div>