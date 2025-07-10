<?php

namespace App\Filament\Resources\XpTeamResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use App\Filament\Resources\XpTeamResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Validation\ValidationException;

class CreateXpTeam extends CreateRecord
{
    protected static string $resource = XpTeamResource::class;

    protected static ?string $title = 'Tambah Tim Expo';

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $user = auth()->id();
        $data['user_id'] = $user;

        $sudahAda = \App\Models\XpTeam::where('nama_team', $data['nama_team'])
            ->exists();

        if ($sudahAda) {
            Notification::make()
                ->warning()
                ->title('Gagal menambahkan tim')
                ->body('Nama tim sudah digunakan.')
                ->persistent()
                ->send();

            throw ValidationException::withMessages([
                'xp_karya_id' => 'Nama tim sudah digunakan.',
            ]);
        }
        
        return $data;
    }
}
