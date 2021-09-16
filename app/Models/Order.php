<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Order extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'orders';

	protected $keyType = 'string';
    public $incrementing = false;
    public $primaryKey = 'id';
    public static function boot() {
        parent::boot();
        static::creating(function($model) {
            $model->id = (string)Str::uuid();
        });
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'order_name',
        'products_id',
        'customer_id',
        'address_id',
        'price_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function products_id()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function customer_id()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function address_id()
    {
        return $this->belongsTo(CustomerAddress::class, 'address_id');
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
