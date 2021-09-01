<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'customer_uuid',
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
