<?php

namespace App\Filament\Resources\XpKaryaResource\Pages;

use Filament\Actions;
use Illuminate\Support\Facades\Storage;
use Filament\Resources\Pages\EditRecord;
use App\Filament\Resources\XpKaryaResource;

class EditXpKarya extends EditRecord
{
    protected static string $resource = XpKaryaResource::class;

    protected static ?string $title = 'Edit Karya Expo';

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $thumbnail = static::getRecord();

        if ($thumbnail && isset($data['thumbnail']) && $data['thumbnail'] !== $thumbnail->thumbnail) {
            if ($thumbnail->thumbnail && Storage::disk('public')->exists($thumbnail->thumbnail)) {
                Storage::disk('public')->delete($thumbnail->thumbnail);
            }
        }

        return $data;
    }
}
