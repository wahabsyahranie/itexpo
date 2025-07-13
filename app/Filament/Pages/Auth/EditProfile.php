<?php

namespace App\Filament\Pages\Auth;

use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Pages\Page;
use App\Models\XpUserExpo;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Wizard;
use Illuminate\Support\Facades\Blade;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Validation\ValidationException;
use Filament\Pages\Auth\EditProfile as BaseEditProfile;

class EditProfile extends BaseEditProfile
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('User')
                        ->label('Profile User')
                        ->schema([
                            $this->getNameFormComponent(),
                            $this->getEmailFormComponent(),
                        ]),
                    Wizard\Step::make('Social')
                        ->label('Sosial Media')
                        ->schema([
                            $this->getUsername(),
                            $this->getWhatsapp(),
                            $this->getGithub(),
                            $this->getInstagram(),
                            $this->getLinkedin(),
                        ]),
                ])->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                    >
                        Submit
                    </x-filament::button>
                    BLADE))
                )
            ]);
    }

    protected function getUsername(): Component
    {
        return TextInput::make('username')
            ->label(__('Username Expo'))
            ->required()
            ->autofocus()
            ->rules([
                'regex:/^[a-z0-9._]+$/',
                'min:3',
                'max:20',
            ])
            ->helperText('Gunakan huruf kecil, angka, titik, atau underscore. Tanpa spasi.');
    }
    
    protected function getLinkedin(): Component
    {
        return TextInput::make('linkedin')
            ->label(__('LinkedIn'))
            ->prefix('https://linkedin.com/in/')
            ->required()
            ->autofocus();
    }
    protected function getInstagram(): Component
    {
        return TextInput::make('instagram')
            ->label(__('Instagram'))
            ->prefix('https://instagram.com/')
            ->required()
            ->autofocus();
    }
    protected function getGithub(): Component
    {
        return TextInput::make('github')
            ->label(__('Github'))
            ->prefix('https://github.com/')
            ->required()
            ->autofocus();
    }
    protected function getWhatsapp(): Component
    {
        return TextInput::make('whatsapp')
            ->label(__('Whatsapp'))
            ->prefix('+62')
            ->numeric()
            ->required()
            ->autofocus();
    }

    //BUTTON FORM
    protected function getFormActions(): array
    {
        return [
            // $this->getSaveFormAction(),
            $this->getCancelFormAction(),
        ];
    }

    //DATA MUTASI
    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        //Menyimpan data field untuk user table
        $userData['name'] = $data['name'];
        $userData['email'] = $data['email'];

        // Cek apakah username sudah digunakan oleh user lain
        $existingExpo = XpUserExpo::where('username', $data['username'])
            ->where('user_id', '!=', $record->id)
            ->first();

        if ($existingExpo) {
            Notification::make()
                ->title('Gagal memperbarui profil')
                ->body('Username sudah digunakan oleh peserta lain.')
                ->warning()
                ->persistent()
                ->send();

            throw ValidationException::withMessages([
                'username' => 'Username sudah digunakan.',
            ]);
        }

        //Menyimpan data field untuk userExpo table
        $expoData = [
            'user_id' => $record->id,
            'username' => $data['username'],
            'linkedin' => $data['linkedin'],
            'github' => $data['github'],
            'instagram' => $data['instagram'],
            'whatsapp' => $data['whatsapp'],
        ];

        XpUserExpo::updateOrInsert(
            ['user_id' => $record->id],
            $expoData
        );

        $record->update($userData);
        return $record;
    }

    //LABEL FORM
    public static function getLabel(): string
    {
        return __('Profile Expo');
    }
}
