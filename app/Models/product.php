<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'image',
        'title',
        'product_category_id',
        'supplier_id', 
        'description',
        'price',
        'stock',
    ];

    /**
     * Ambil semua produk dengan kategori dan supplier
     */
    public function get_product()
    {
        return $this->select(
                        'products.*',
                        'category_product.product_category_name as category_name',
                        'supplier.supplier_name as nama_supplier'
                    )
                    ->leftJoin('category_product', 'category_product.id', '=', 'products.product_category_id')
                    ->leftJoin('supplier', 'supplier.id', '=', 'products.supplier_id');
    }

    /**
     * Relasi ke kategori
     */
    public function category()
    {
        return $this->belongsTo(\App\Models\Category_product::class, 'product_category_id');
    }

    /**
     * Relasi ke supplier
     */
    public function supplier()
    {
        return $this->belongsTo(\App\Models\Supplier::class, 'supplier_id');
    }

    /**
     * Simpan produk baru
     */
   public static function storeProduct($request, $imagePath)
{
    return self::create([
        'image'              => $imagePath, // simpan path lengkap
        'title'              => $request->title,
        'product_category_id'=> $request->product_category_id,
        'supplier_id'        => $request->supplier_id,
        'description'        => $request->description,
        'price'              => $request->harga,
        'stock'              => $request->stock,
    ]);
}


}
