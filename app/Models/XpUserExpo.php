<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class XpUserExpo extends Model
{
    protected $table = 'xp_user_expos';
    protected $fillable = ['user_id', 'linkedin', 'instagram', 'github', 'whatsapp'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function xpAnggotaTeams(): HasMany
    {
        return $this->hasMany(XpAnggotaTeam::class);
    }
}
