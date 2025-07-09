<?php

namespace App\Filament\Resources;

use App\Filament\Resources\XpKaryaResource\Pages;
use App\Filament\Resources\XpKaryaResource\RelationManagers;
use App\Models\XpKarya;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class XpKaryaResource extends Resource
{
    protected static ?string $model = XpKarya::class;

    protected static ?string $navigationIcon = 'heroicon-m-cube-transparent';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return 'Proyek';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
                Forms\Components\Select::make('xp_kategori_id')
                    ->relationship('xpKategori', 'id')
                    ->required(),
                Forms\Components\Select::make('xp_team_id')
                    ->relationship('xpTeam', 'id')
                    ->required(),
                Forms\Components\TextInput::make('nama_karya')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('video_promosi')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('banner')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('poster')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('ppt')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('thumbnail')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun_dibuat')
                    ->required(),
                Forms\Components\Toggle::make('dipublikasi')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('xpKategori.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('xpTeam.id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nama_karya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video_promosi')
                    ->searchable(),
                Tables\Columns\TextColumn::make('banner')
                    ->searchable(),
                Tables\Columns\TextColumn::make('poster')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ppt')
                    ->searchable(),
                Tables\Columns\TextColumn::make('thumbnail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tahun_dibuat'),
                Tables\Columns\IconColumn::make('dipublikasi')
                    ->boolean(),
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
            'index' => Pages\ListXpKaryas::route('/'),
            'create' => Pages\CreateXpKarya::route('/create'),
            'edit' => Pages\EditXpKarya::route('/{record}/edit'),
        ];
    }
}
