<?php

namespace App\Filament\Resources\XpKaryaResource\Pages;

use App\Filament\Resources\XpKaryaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListXpKaryas extends ListRecords
{
    protected static string $resource = XpKaryaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
