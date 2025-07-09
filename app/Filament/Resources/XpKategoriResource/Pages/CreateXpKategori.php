<?php

namespace App\Filament\Resources\XpKategoriResource\Pages;

use App\Filament\Resources\XpKategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateXpKategori extends CreateRecord
{
    protected static string $resource = XpKategoriResource::class;

    protected static ?string $title = 'Tambah Kategori';
}
