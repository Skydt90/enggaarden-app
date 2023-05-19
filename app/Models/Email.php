<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'message', 'group', 'user_id', 'subject', 'member_id'
    ];

    public const MAIL_GROUPS = [
        'Primær' => 'member_type', 'Sekundær' => 'member_type',
        'Ekstern' => 'member_type', 'Bestyrelsen' => 'is_board', 'Alle' => 'Alle'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
}
