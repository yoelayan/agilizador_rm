<?php

namespace App\Entities;



class AlertEntity
{
    
    public function __construct($kind, $model, $status)
    {
        $this->kind = $kind;
        $this->model = $model;
        $this->status = $status;
        $this->setConf($kind);
    }
    public function getActions(){
        return array(
            'Success' => [
                'css' => 'alert-success',
                'description' => 'Se ha ejecutado la petición satisfactoriamente.'
            ],
            'Error' => [
                'css' => 'alert-danger',
                'description' => 'Se ha rechazado la petición.'
            ],
            'Loader' => [
                'css' => 'alert-primary',
                'description' => 'Se esta cargando la petición.'
            ],
        );
    }

    public function setConf($kind)
    {
        $this->conf = $this->getActions()[$kind];
    }
}