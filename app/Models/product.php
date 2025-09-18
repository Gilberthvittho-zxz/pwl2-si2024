<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function scopeWithCategorySupplier($query)
    {
        return $query->select(
                        'products.*',
                        'category_product.product_category_name as category_name',
                        'supplier.supplier_name as supplier_name'
                    )
                    ->leftJoin('category_product', 'category_product.id', '=', 'products.product_category_id')
                    ->leftJoin('supplier', 'supplier.id', '=', 'products.supplier_id');
    }
}



















