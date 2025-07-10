<?php

namespace App\Filament\Resources\XpUserExpoResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\XpUserExpoResource;
use Illuminate\Validation\ValidationException;

class CreateXpUserExpo extends CreateRecord
{
    protected static string $resource = XpUserExpoResource::class;

    protected static ?string $title = 'Tambah Peserta';

    protected function mutateFormDataBeforeCreate(array $data): array
    {

        $sudahAda = \App\Models\XpTeam::where('user_id', $data['user_id'])
            ->exists();

        if ($sudahAda) {
            Notification::make()
                ->warning()
                ->title('Gagal menambahkan peserta')
                ->body('Peserta sudah ada')
                ->persistent()
                ->send();

            throw ValidationException::withMessages([
                'xp_karya_id' => 'Peserta sudah ada.',
            ]);
        }
        return $data;
    }
}
