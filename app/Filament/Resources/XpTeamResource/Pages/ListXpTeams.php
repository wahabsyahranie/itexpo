<?php

namespace App\Filament\Resources\XpTeamResource\Pages;

use App\Filament\Resources\XpTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListXpTeams extends ListRecords
{
    protected static string $resource = XpTeamResource::class;

    protected static ?string $title = 'Daftar Tim Expo';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Tim'),
        ];
    }
}
