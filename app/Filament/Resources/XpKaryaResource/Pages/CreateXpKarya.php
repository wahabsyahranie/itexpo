<?php

namespace App\Filament\Resources\XpKaryaResource\Pages;

use Filament\Actions;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\XpKaryaResource;

class CreateXpKarya extends CreateRecord
{
    protected static string $resource = XpKaryaResource::class;

    protected static ?string $title = 'Tambah Karya Expo';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->id();
        $data['user_id'] = $user;

        return $data;
    }
}
