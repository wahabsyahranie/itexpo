<?php

namespace App\Filament\Resources;

use App\Filament\Resources\XpSukaKaryaResource\Pages;
use App\Filament\Resources\XpSukaKaryaResource\RelationManagers;
use App\Models\XpSukaKarya;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class XpSukaKaryaResource extends Resource
{
    protected static ?string $model = XpSukaKarya::class;

    protected static ?string $navigationIcon = 'heroicon-m-heart';

    protected static ?int $navigationSort = 2;

    public static function getNavigationLabel(): string
    {
        return 'Disukai';
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('xp_karya_id')
                    ->relationship('xpKarya', 'nama_karya')
                    ->label('Karya')
                    ->required()
                    ->native()
                    ->searchable()
                    ->preload(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('xpKarya.nama_karya')
                    ->label('Nama Karya')
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
            'index' => Pages\ListXpSukaKaryas::route('/'),
            'create' => Pages\CreateXpSukaKarya::route('/create'),
            'edit' => Pages\EditXpSukaKarya::route('/{record}/edit'),
        ];
    }
}
