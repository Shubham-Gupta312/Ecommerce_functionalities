<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductCategoryModel extends Model
{
    protected $table = "product_cateogries";
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'image', 'status'];
}