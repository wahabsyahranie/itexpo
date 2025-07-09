<?php

namespace App\Filament\Resources\XpKaryaResource\Pages;

use App\Filament\Resources\XpKaryaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListXpKaryas extends ListRecords
{
    protected static string $resource = XpKaryaResource::class;

    protected static ?string $title = 'Daftar Karya Expo';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Karya'),
        ];
    }
}
