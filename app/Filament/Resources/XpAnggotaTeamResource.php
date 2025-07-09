<?php

namespace App\Filament\Resources;

use App\Filament\Resources\XpAnggotaTeamResource\Pages;
use App\Filament\Resources\XpAnggotaTeamResource\RelationManagers;
use App\Models\XpAnggotaTeam;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class XpAnggotaTeamResource extends Resource
{
    protected static ?string $model = XpAnggotaTeam::class;

    protected static ?string $navigationIcon = 'heroicon-m-user-group';

    public static function getNavigationLabel(): string
    {
        return 'Anggota Tim';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('xp_user_expo_id')
                    ->relationship('xpUserExpo', 'id')
                    ->required(),
                Forms\Components\Select::make('xp_team_id')
                    ->relationship('xpTeam', 'id')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('xpUserExpo.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('xpTeam.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListXpAnggotaTeams::route('/'),
            'create' => Pages\CreateXpAnggotaTeam::route('/create'),
            'edit' => Pages\EditXpAnggotaTeam::route('/{record}/edit'),
        ];
    }
}
