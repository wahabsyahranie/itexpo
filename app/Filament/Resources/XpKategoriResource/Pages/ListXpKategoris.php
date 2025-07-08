<?php

namespace App\Filament\Resources\XpKategoriResource\Pages;

use App\Filament\Resources\XpKategoriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListXpKategoris extends ListRecords
{
    protected static string $resource = XpKategoriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
