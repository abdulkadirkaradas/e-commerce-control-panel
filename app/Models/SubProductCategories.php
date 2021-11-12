<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class SubProductCategories extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'sub_product_categories';

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
        'category_name',
        'product_category_id',
        'sorting',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function product_category_id()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
