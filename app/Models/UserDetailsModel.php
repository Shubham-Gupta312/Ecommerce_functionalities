<?php

namespace App\Models;

use CodeIgniter\Model;

class UserDetailsModel extends Model
{
    protected $table = "user_detail";
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $allowedFields = [
        'user_id', 
        'name',
        'country',
        'state', 
        'district',
        'pincode',
        'phone',
        'address', 
        'permanent_address'
    ];
}