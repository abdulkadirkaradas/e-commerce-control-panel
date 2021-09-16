<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'products';

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
        'category_id',
        'status_id',
        'name',
        'description',
        'price',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category_id()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function status_id()
    {
        return $this->belongsTo(ProductStatus::class, 'status_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
