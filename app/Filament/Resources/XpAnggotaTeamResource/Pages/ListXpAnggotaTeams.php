<?php

namespace App\Filament\Resources\XpAnggotaTeamResource\Pages;

use App\Filament\Resources\XpAnggotaTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListXpAnggotaTeams extends ListRecords
{
    protected static string $resource = XpAnggotaTeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
