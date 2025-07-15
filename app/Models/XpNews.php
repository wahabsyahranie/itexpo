<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class XpNews extends Model
{
    protected $casts = [
        'gambar_berita' => 'array',
    ];

    protected $table = 'xp_news';
    protected $fillable = ['nama_berita', 'deskripsi_berita', 'slug', 'dipublikasi', 'gambar_berita', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
