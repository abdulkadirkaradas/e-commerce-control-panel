<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CustomerAddress extends Model
{
    use SoftDeletes;
    use HasFactory;

    public const STREET_SELECT = [
    ];

    public const QUARTER_SELECT = [
    ];

    public const PROVINCE_SELECT = [
    ];

    public const DISTRICT_SELECT = [
    ];

    public $table = 'customer_addresses';

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
        'customer_id',
        'province',
        'district',
        'quarter',
        'street',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
