<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class XpAnggotaTeam extends Model
{
    protected $table = 'xp_anggota_teams';
    protected $fillable = ['xp_user_expo_id', 'xp_team_id'];

    public function xpUserExpo(): BelongsTo
    {
        return $this->belongsTo(XpUserExpo::class);
    }

    public function xpTeam(): BelongsTo
    {
        return $this->belongsTo(XpTeam::class);
    }
}
