<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShoppingCart extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'shopping_carts';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'customer_uuid_id',
        'product_uuid_id',
        'quantity',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function customer_uuid()
    {
        return $this->belongsTo(Customer::class, 'customer_uuid_id');
    }

    public function product_uuid()
    {
        return $this->belongsTo(Product::class, 'product_uuid_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
