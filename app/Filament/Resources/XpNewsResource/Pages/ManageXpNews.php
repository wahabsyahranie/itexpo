<?php

namespace App\Filament\Resources\XpNewsResource\Pages;

use App\Filament\Resources\XpNewsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageXpNews extends ManageRecords
{
    protected static string $resource = XpNewsResource::class;

    protected static ?string $title = 'Daftar Berita';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Berita')
                ->mutateFormDataUsing(function (array $data): array {
                    $data['user_id'] = auth()->id();
                    
                    $slug = str_replace(' ', '-', $data['nama_berita']);
                    $data['slug'] = hash('sha256', $slug);

                    // dd($data['slug']);
                    return $data;
                }),
        ];
    }
}
