<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\XpNews;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\XpNewsResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\XpNewsResource\RelationManagers;
use Illuminate\Database\Eloquent\Model;

class XpNewsResource extends Resource
{
    protected static ?string $model = XpNews::class;

    protected static ?string $navigationIcon = 'heroicon-m-newspaper';

    protected static ?int $navigationSort = 6;

    protected static ?string $navigationGroup = 'Pengaturan';

    public static function getNavigationLabel(): string
    {
        return 'Berita';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('nama_berita')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\RichEditor::make('deskripsi_berita')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('gambar_berita')
                    ->disk('public')
                    // ->required()
                    ->directory('berita')
                    ->storeFileNamesIn('berita_file_names')
                    ->image()
                    ->imageCropAspectRatio('1:1')
                    ->imageEditor()
                    ->visibility('public')
                    ->multiple()
                    ->maxParallelUploads(3),
                Forms\Components\Toggle::make('dipublikasi')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('nama_berita')
                    ->searchable(),
                Tables\Columns\IconColumn::make('dipublikasi')
                    ->boolean(),
                Tables\Columns\TextColumn::make('slug')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Actions\EditAction::make()
                    ->mutateFormDataUsing(function (Model $record, array $data): array {
                        $oldFiles = $record->gambar_berita ?? []; // dari DB
                        $newFiles = $data['gambar_berita'] ?? []; // dari form baru

                        // Konversi string ke array jika perlu
                        if (is_string($oldFiles)) {
                            $oldFiles = json_decode($oldFiles, true) ?? [];
                        }

                        // Cari file yang dihapus oleh user
                        $deletedFiles = array_diff($oldFiles, $newFiles);

                        foreach ($deletedFiles as $file) {
                            if (Storage::disk('public')->exists($file)) {
                                Storage::disk('public')->delete($file);
                            }
                        }

                        return $data;
                    }),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageXpNews::route('/'),
        ];
    }
}
