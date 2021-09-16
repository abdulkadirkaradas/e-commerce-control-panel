<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Customer extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'customers';

	protected $keyType = 'string';
    public $incrementing = false;
    public $primaryKey = 'id';
    public static function boot() {
        parent::boot();
        static::creating(function($model) {
            $model->id = (string)Str::uuid();
        });
    }

    protected $hidden = [
        'password',
    ];

    protected $dates = [
        'date_of_birth',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'surname',
        'date_of_birth',
        'phone',
        'address_id',
        'email',
        'password',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDateOfBirthAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateOfBirthAttribute($value)
    {
        $this->attributes['date_of_birth'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function address()
    {
        return $this->belongsTo(CustomerAddress::class, 'address_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
