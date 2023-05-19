<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name', 'last_name', 'email',
        'phone_number', 'is_board', 'type', 'is_company', 'last_reminder_sent_at'
    ];

    protected $casts = [
        'last_reminder_sent_at' => 'datetime',
        'is_company' => 'bool',
        'is_board' => 'bool',
    ];

    public const MEMBER_TYPES = [
        'Ekstern', 'Sekundær', 'Primær'
    ];

    public function address(): HasOne
    {
        return $this->hasOne(MemberAddress::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function emails(): HasMany
    {
        return $this->hasMany(Email::class);
    }
}
