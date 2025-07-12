<?php

namespace App\Filament\Resources;

use App\Filament\Resources\XpUserExpoResource\Pages;
use App\Filament\Resources\XpUserExpoResource\RelationManagers;
use App\Models\XpUserExpo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class XpUserExpoResource extends Resource
{
    protected static ?string $model = XpUserExpo::class;

    protected static ?string $navigationIcon = 'heroicon-m-users';

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationGroup = 'Pengaturan';

    public static function getNavigationLabel(): string
    {
        return 'Peserta Expo';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Nama Pengguna')
                    ->relationship('user', 'name')
                    ->required()
                    ->native(false)
                    ->searchable(),
                Forms\Components\TextInput::make('linkedin')
                    ->prefix('https://linkedin.com/in/')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('instagram')
                    ->prefix('https://instagram.com/')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('github')
                    ->prefix('https://github.com/')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('whatsapp')
                    ->prefix('+62')
                    ->numeric()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkedin'),
                Tables\Columns\TextColumn::make('instagram'),
                Tables\Columns\TextColumn::make('github'),
                Tables\Columns\TextColumn::make('whatsapp'),
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
            ])
            ->query(
                XpUserExpo::query()->with('user') // ⬅️ PENTING!
            );
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
            'index' => Pages\ListXpUserExpos::route('/'),
            'create' => Pages\CreateXpUserExpo::route('/create'),
            'edit' => Pages\EditXpUserExpo::route('/{record}/edit'),
        ];
    }
}
