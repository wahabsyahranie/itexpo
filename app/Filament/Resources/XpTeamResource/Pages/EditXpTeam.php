<?php

namespace App\Filament\Resources\XpTeamResource\Pages;

use App\Filament\Resources\XpTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditXpTeam extends EditRecord
{
    protected static string $resource = XpTeamResource::class;

    protected static ?string $title = 'Edit Tim Expo';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
