<?php

namespace App\Filament\Resources\XpKategoriResource\Pages;

use App\Filament\Resources\XpKategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditXpKategori extends EditRecord
{
    protected static string $resource = XpKategoriResource::class;

    protected static ?string $title = 'Daftar Kategori';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
