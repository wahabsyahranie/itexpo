<?php

namespace App\Filament\Resources\XpTeamResource\Pages;

use App\Filament\Resources\XpTeamResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateXpTeam extends CreateRecord
{
    protected static string $resource = XpTeamResource::class;

    protected static ?string $title = 'Tambah Tim Expo';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->id();
        $data['user_id'] = $user;

        return $data;
    }
}
