<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetailedQrCodeModel extends Model
{
    protected $table = 'detailed_qr_codes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'name', 'details', 'qr_code_image', 'picture', 'created_at', 'updated_at'];

    protected $useTimestamps = true; 
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
