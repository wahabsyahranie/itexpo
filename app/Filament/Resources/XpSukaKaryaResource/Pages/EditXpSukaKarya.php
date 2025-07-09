<?php

namespace App\Filament\Resources\XpSukaKaryaResource\Pages;

use App\Filament\Resources\XpSukaKaryaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditXpSukaKarya extends EditRecord
{
    protected static string $resource = XpSukaKaryaResource::class;

    protected static ?string $title = 'Edit Karya Yang Disukai';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
