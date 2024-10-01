<?php

namespace App\Models;

use CodeIgniter\Model;

class QrCodeModel extends Model
{
    protected $table = 'qr_codes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'link', 'qr_code_image'];
    
    protected $useTimestamps = true; 
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
