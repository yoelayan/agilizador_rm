<?php

namespace App\Models;

use CodeIgniter\Model;

class Properties extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'properties';
    protected $primaryKey       = 'id_properties';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_properties',
        'agent',
        'area_type',
        'housing_type',
        'business_model',
        'bedrooms',
        'bathrooms',
        'garages',
        'meters_construction',
        'meters_land',
        'environments',
        'amenities',
        'exterior',
        'adjacencies',
        'advertising_status',
        'market_type',
        'state',
        'municipality',
        'address',
        'price',
        'owner',
        'owner_mail',
        'owner_phone',
        'status',
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
