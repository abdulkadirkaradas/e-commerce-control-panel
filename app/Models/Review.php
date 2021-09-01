<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'reviews';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'customer_uuid',
        'product_uuid',
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
