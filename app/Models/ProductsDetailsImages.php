<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ProductsDetailsImages extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'products_details_images';

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
        'file_id',
        'file_name',
        'file_extension',
        'file_url',
        'image_url',
        'picture_type',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
