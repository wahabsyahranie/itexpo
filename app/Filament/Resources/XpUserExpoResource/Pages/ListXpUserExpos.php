<?php

namespace App\Filament\Resources\XpUserExpoResource\Pages;

use App\Filament\Resources\XpUserExpoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListXpUserExpos extends ListRecords
{
    protected static string $resource = XpUserExpoResource::class;

    protected static ?string $title = 'Daftar Peserta Expo';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Peserta Expo'),
        ];
    }
}
