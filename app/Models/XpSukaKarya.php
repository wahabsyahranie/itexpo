<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class XpSukaKarya extends Model
{
    protected $table = 'xp_suka_karyas';
    protected $fillable = ['user_id', 'xp_karya_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function xpKarya(): BelongsTo
    {
        return $this->belongsTo(XpKarya::class);
    }
}
