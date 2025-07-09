<?php

namespace App\Filament\Resources\XpSukaKaryaResource\Pages;

use App\Filament\Resources\XpSukaKaryaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateXpSukaKarya extends CreateRecord
{
    protected static string $resource = XpSukaKaryaResource::class;

    protected static ?string $title = 'Tambah Karya Yang Disukai';
}
