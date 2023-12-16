<?php

namespace App\Models;

use CodeIgniter\Model;

class EcomModel extends Model
{
    protected $table = "users";
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'email', 'password'];
}