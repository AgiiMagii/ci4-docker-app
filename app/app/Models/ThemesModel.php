<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class ThemesModel extends Model
{
    protected $table            = 'Themes';
    protected $primaryKey       = 'themeID';
    protected $useAutoIncrement = true;

    // Return type: array or entity
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    // Allowed fields
    protected $allowedFields    = [
        'Name',
        'Description'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = '';
    protected $updatedField  = '';
    protected $deletedField  = '';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;

    
}