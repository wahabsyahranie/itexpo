<?php

namespace App\Filament\Resources\XpSukaKaryaResource\Pages;

use App\Filament\Resources\XpSukaKaryaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListXpSukaKaryas extends ListRecords
{
    protected static string $resource = XpSukaKaryaResource::class;

    protected static ?string $title = 'Daftar Proyek Yang Disukai';

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
