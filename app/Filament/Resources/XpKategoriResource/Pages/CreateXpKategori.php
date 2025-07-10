<?php

namespace App\Filament\Resources\XpKategoriResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\XpKategoriResource;
use Illuminate\Validation\ValidationException;

class CreateXpKategori extends CreateRecord
{
    protected static string $resource = XpKategoriResource::class;

    protected static ?string $title = 'Tambah Kategori';

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $sudahAda = \App\Models\XpKategori::where('nama_kategori', $data['nama_kategori'])
            ->exists();

        if ($sudahAda) {
            Notification::make()
                ->warning()
                ->title('Gagal menambahkan kategori baru')
                ->body('Kategori sudah ada')
                ->persistent()
                ->send();

            throw ValidationException::withMessages([
                'xp_karya_id' => 'Kategori sudah ada.',
            ]);
        }
        return $data;
    }
}
