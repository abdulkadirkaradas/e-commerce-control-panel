<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductDetail extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'product_details';

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
        'product_id',
        'details',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function product_id()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function image_id()
    {
        return $this->belongsTo(ProductsDetailsImages::class, 'image_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
