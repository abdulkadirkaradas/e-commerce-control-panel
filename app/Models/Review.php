<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Review extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'reviews';

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
        'product_id',
        'rate_score',
        'review',
        'attachment_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function attachment()
    {
        return $this->belongsTo(ReviewAttachment::class, 'attachment_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
