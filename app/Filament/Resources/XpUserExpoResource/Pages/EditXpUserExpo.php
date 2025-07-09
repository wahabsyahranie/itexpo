<?php

namespace App\Filament\Resources\XpUserExpoResource\Pages;

use App\Filament\Resources\XpUserExpoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditXpUserExpo extends EditRecord
{
    protected static string $resource = XpUserExpoResource::class;

    protected static ?string $title = 'Edit Peserta Expo';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
