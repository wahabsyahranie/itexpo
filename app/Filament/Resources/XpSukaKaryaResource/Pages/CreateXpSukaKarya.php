<?php

namespace App\Filament\Resources\XpSukaKaryaResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;
use App\Filament\Resources\XpSukaKaryaResource;

class CreateXpSukaKarya extends CreateRecord
{
    protected static string $resource = XpSukaKaryaResource::class;

    protected static ?string $title = 'Tambah Karya Yang Disukai';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->id();
        $data['user_id'] = $user;

        $sudahAda = \App\Models\XpSukaKarya::where('user_id', $user)
            ->where('xp_karya_id', $data['xp_karya_id'])
            ->exists();

        if ($sudahAda) {
            Notification::make()
                ->warning()
                ->title('Gagal menambahkan suka')
                ->body('Anda sudah menyukai karya ini.')
                ->persistent()
                ->send();

            throw ValidationException::withMessages([
                'xp_karya_id' => 'Anda sudah menyukai karya ini.',
            ]);
        }

        return $data;
    }
}
