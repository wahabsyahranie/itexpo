<?php

namespace App\Filament\Resources;

use App\Filament\Resources\XpKategoriResource\Pages;
use App\Filament\Resources\XpKategoriResource\RelationManagers;
use App\Models\XpKategori;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class XpKategoriResource extends Resource
{
    protected static ?string $model = XpKategori::class;

    protected static ?string $navigationIcon = 'heroicon-m-tag';

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationGroup = 'Pengaturan';

    public static function getNavigationLabel(): string
    {
        return 'Kategori';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kategori')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('gambar_kategori')
                    ->disk('public')
                    ->label('Icon')
                    ->required()
                    ->directory('kategori')
                    ->storeFileNamesIn('kategori_file_names')
                    ->acceptedFileTypes(['image/svg'])
                    ->rules(['mimes:svg'])
                    ->image()
                    // ->imageCropAspectRatio('4:3')
                    ->imageEditor()
                    ->visibility('public')
                    ,
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('No')
                    ->rowIndex(),
                Tables\Columns\ImageColumn::make('gambar_kategori')
                    ->extraImgAttributes(fn (XpKategori $record): array => [
                        'alt' => "{$record->name} gambar",
                    ])
                    ->circular(),
                Tables\Columns\TextColumn::make('nama_kategori')
                    ->label('Kategori')
                    ->searchable(),
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
            'index' => Pages\ListXpKategoris::route('/'),
            'create' => Pages\CreateXpKategori::route('/create'),
            'edit' => Pages\EditXpKategori::route('/{record}/edit'),
        ];
    }
}
