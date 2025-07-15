<?php

namespace App\Filament\Resources\XpKategoriResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\XpKategoriResource;

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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $gambar = static::getRecord();

        if ($gambar && isset($data['gambar_kategori']) && $data['gambar_kategori'] !== $gambar->gambar_kategori) {
            if ($gambar->gambar_kategori && Storage::disk('public')->exists($gambar->gambar_kategori)) {
                Storage::disk('public')->delete($gambar->gambar_kategori);
            }
        }

        return $data;
    }
}
