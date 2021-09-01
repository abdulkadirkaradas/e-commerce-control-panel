<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_name',
        'products_uuid_id',
        'customer_uuid_id',
        'address_uuid_id',
        'price_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function products_uuid()
    {
        return $this->belongsTo(Product::class, 'products_uuid_id');
    }

    public function customer_uuid()
    {
        return $this->belongsTo(Customer::class, 'customer_uuid_id');
    }

    public function address_uuid()
    {
        return $this->belongsTo(CustomerAddress::class, 'address_uuid_id');
    }

    public function price()
    {
        return $this->belongsTo(Product::class, 'price_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
