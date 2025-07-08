<?php

namespace App\Filament\Resources\XpAnggotaTeamResource\Pages;

use App\Filament\Resources\XpAnggotaTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditXpAnggotaTeam extends EditRecord
{
    protected static string $resource = XpAnggotaTeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
