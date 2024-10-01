<?php

namespace App\Models;

use CodeIgniter\Model;

class VersionModel extends Model
{
    protected $table = 'version'; 
    protected $primaryKey = 'id'; 

    protected $useAutoIncrement = true; 

    protected $returnType = 'array'; 

    protected $useSoftDeletes = false; 

    protected $allowedFields = ['level']; // Allowed fields for mass assignment

    // Date fields
    protected $useTimestamps = false; // No timestamp fields used
}
