<?php

namespace App\Filament\Resources\XpTeamResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Arr;
use App\Models\XpAnggotaTeam;
use PhpParser\Node\Stmt\Label;
use Illuminate\Validation\Rule;
use Filament\Actions\CreateAction;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class XpAnggotaTeamRelationManager extends RelationManager
{
    protected static string $relationship = 'xpAnggotaTeams';

    protected static ?string $title = 'Daftar Anggota Tim';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('xp_user_expo_id')
                    ->label('Nama Mahasiswa')
                    ->columnSpanFull()
                    ->options(
                        \App\Models\XpUserExpo::with('user')
                            ->whereHas('user')
                            ->get()
                            ->mapWithKeys(function ($expo) {
                                return [$expo->id => $expo->user->name];
                            }))
                            ->searchable()
                            ->placeholder('Pilih user...')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('nama')
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('xpUserExpo.user.name')
                    ->label('Anggota'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label('Tambah Anggota')
                    ->before(function ($action, array $data) {
                        $xpTeamId = $action->getLivewire()->ownerRecord->id;

                        $sudahAda = \App\Models\XpAnggotaTeam::where('xp_user_expo_id', $data['xp_user_expo_id'])
                            ->where('xp_team_id', $xpTeamId)
                            ->exists();

                        if ($sudahAda) {
                            Notification::make()
                                ->warning()
                                ->title('Gagal menambahkan anggota')
                                ->body('Anggota sudah tergabung dalam tim ini.')
                                ->persistent()
                                ->send();

                            $action->halt();
                        }
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
