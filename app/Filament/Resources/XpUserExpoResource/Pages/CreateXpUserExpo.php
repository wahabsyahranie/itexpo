<?php

namespace App\Filament\Resources\XpUserExpoResource\Pages;

use App\Filament\Resources\XpUserExpoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateXpUserExpo extends CreateRecord
{
    protected static string $resource = XpUserExpoResource::class;

    protected static ?string $title = 'Tambah Peserta';
}
