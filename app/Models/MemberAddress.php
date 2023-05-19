<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemberAddress extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'member_id', 'street_name',
        'zip_code', 'city', 'member_id'
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
