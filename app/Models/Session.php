<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Session extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'sessions';

    public $incrementing = false;
    public $primarykey = 'id';
    public static function boot()
    {
        parent::boot();
        static::creating(function($model) {
            $model->id = (string)Str::uuid();
        });
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'access_time'
    ];

    protected $fillable = [
        'user_id',
        'user_name',
        'ip_address'
    ];

    public function sessionUsers()
    {
        return $this->hasMany(Users::class, 'user_id', 'id');
    }
}
