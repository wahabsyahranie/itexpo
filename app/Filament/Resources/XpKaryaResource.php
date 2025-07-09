<?php

namespace App\Filament\Resources;

use filament;
use Filament\Forms;
use Filament\Tables;
use App\Models\XpKarya;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Illuminate\Support\Facades\Blade;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Wizard\Step;
use App\Filament\Resources\XpKaryaResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\XpKaryaResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class XpKaryaResource extends Resource
{
    protected static ?string $model = XpKarya::class;

    protected static ?string $navigationIcon = 'heroicon-m-cube-transparent';

    protected static ?int $navigationSort = 1;

    public static function getNavigationLabel(): string
    {
        return 'Karya';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Karya')
                        ->schema([
                            Forms\Components\Select::make('xp_kategori_id')
                                ->relationship('xpKategori', 'nama_kategori')
                                ->native(false)
                                ->label('Kategori')
                                ->required(),
                            Forms\Components\Select::make('xp_team_id')
                                ->relationship('xpTeam', 'nama_team')
                                ->label('Team')
                                ->native(false)
                                ->required(),
                            Forms\Components\TextInput::make('nama_karya')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('tahun_dibuat')
                                ->required()
                                ->maxLength(4)
                                ->numeric(),
                            Forms\Components\Textarea::make('deskripsi')
                                ->required()
                                ->columnSpanFull()
                                ->autosize(),
                        ])
                        ->columns(2)
                        ->icon('heroicon-m-cube-transparent')
                        ->completedIcon('heroicon-o-cube-transparent'),
                    Wizard\Step::make('Detail')
                        ->schema([
                            Forms\Components\TextInput::make('banner')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('poster')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('video_promosi')
                                ->required()
                                ->maxLength(255),
                            Forms\Components\TextInput::make('ppt')
                                ->required()
                                ->label('PPT')
                                ->maxLength(255),
                            Forms\Components\FileUpload::make('thumbnail')
                                ->disk('public')
                                ->required()
                                ->directory('thumbnail')
                                ->getUploadedFileNameForStorageUsing(
                                    fn (TemporaryUploadedFile $file): string => 'thumbnail-' . $file->hashName(),
                                )
                                ->image()
                                ->imageCropAspectRatio('4:3')
                                ->columnSpanFull(),
                        ])
                        ->columns(2)
                        ->icon('heroicon-m-queue-list')
                        ->completedIcon('heroicon-o-queue-list')
                ])
                ->columnSpanFull()
                ->submitAction(new HtmlString(Blade::render(<<<BLADE
                    <x-filament::button
                        type="submit"
                        size="sm"
                    >
                        Submit
                    </x-filament::button>
                BLADE))),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Anggota')
                    ->searchable(),
                Tables\Columns\TextColumn::make('xpTeam.nama_team')
                    ->label('Nama Tim')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_karya')
                    ->searchable(),
                Tables\Columns\TextColumn::make('video_promosi')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('banner')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('poster')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('ppt')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('thumbnail')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tahun_dibuat')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('xpKategori.nama_kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Internet of Things' => 'info',
                        'Website' => 'warning',
                        'Machine Learning' => 'success',
                        'Film' => 'danger',
                        default => 'gray',
                    }),
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
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\Action::make('ispublikasi')
                        ->color('success')
                        ->label('Publikasikan')
                        ->icon('heroicon-o-check-circle')
                        ->requiresConfirmation()
                        // ->visible(fn (XpKarya $record) => Auth::user()->hasAnyRole(['super_admin', 'admin']) && $record->status !== 'ditampilkan')
                        ->action(function (XpKarya $record) {
                            $record->update(['dipublikasi' => 1]);
                        }),
                    Tables\Actions\Action::make('isprivate')
                        ->color('danger')
                        ->label('Privatkan')
                        ->icon('heroicon-o-x-circle')
                        ->requiresConfirmation()
                        // ->visible(fn (XpKarya $record) => Auth::user()->hasAnyRole(['super_admin', 'admin']) && $record->status !== 'ditampilkan')
                        ->action(function (XpKarya $record) {
                            $record->update(['dipublikasi' => 0]);
                        }),
                ])
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