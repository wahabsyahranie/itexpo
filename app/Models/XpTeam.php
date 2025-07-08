<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class XpTeam extends Model
{
    protected $table = 'xp_teams';
    protected $fillable = ['user_id', 'nama_team'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function xpAnggotaTeam(): HasMany
    {
        return $this->hasMany(XpAnggotaTeam::class);
    }

    public function xpKaryas(): HasMany
    {
        return $this->hasMany(XpKarya::class);
    }
}
