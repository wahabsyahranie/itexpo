<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class XpKarya extends Model
{
    use Searchable;

    protected $table = 'xp_karyas';
    protected $fillable = ['user_id', 'xp_kategori_id', 'xp_team_id', 'nama_karya', 'deskripsi', 'video_promosi', 'banner', 'poster', 'ppt', 'thumbnail', 'tahun_dibuat', 'dipublikasi'];

    public function xpTeam(): BelongsTo
    {
        return $this->belongsTo(XpTeam::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function xpKategori(): BelongsTo
    {
        return $this->belongsTo(XpKategori::class);
    }

    public function xpSukaKarya(): HasMany
    {
        return $this->hasMany(XpSukaKarya::class);
    }

    public function toSearchableArray()
    {
        return [
            'nama_karya' => $this->nama_karya,
            'tahun_dibuat' => $this->tahun_dibuat,
        ];
    }
}
