<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Berita';

    protected static ?string $pluralModelLabel = 'Daftar Berita';

    public static function getNavigationGroup(): ?string
    {
        return 'Berita';
    }

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-book-open';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul Berita')
                    ->required()
                    ->maxLength(100)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation !== 'create') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),

                // Saat CREATE
                TextInput::make('slug')
                    ->label('URL Slug')
                    ->required()
                    ->maxLength(255)
                    ->dehydrated()
                    ->disabled()
                    ->hidden(fn (string $operation): bool => $operation === 'create')
                    ->hidden(fn (string $operation): bool => $operation === 'edit'),

                // Saat EDIT: Show dengan warning
                TextInput::make('slug')
                    ->label('URL Slug')
                    ->required()
                    ->maxLength(255)
                    ->helperText('⚠️ Slug digunakan untuk URL berita')
                    ->visible(fn (string $operation): bool => $operation === 'edit'),

                FileUpload::make('gambar')
                    ->label('Gambar Berita')
                    ->image()
                    ->disk('public')
                    ->directory('berita')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->required(),

                RichEditor::make('isiBerita')
                    ->label('Isi Berita')
                    ->required()
                    ->columnSpanFull(),
                Select::make('status')
                    ->required()
                    ->options([
                        'published' => 'Published',
                        'not_published' => 'Not Published',
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->wrap(),

                TextColumn::make('isiBerita')
                    ->label('Isi Berita')
                    ->limit(50)
                    ->wrap(),

                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->disk('public')
                    ->visibility('public')
                    ->getStateUsing(function ($record) {
                        return $record->gambar ? asset('storage/'.$record->gambar) : null;
                    })
                    ->size(60)
                    ->square(),

                TextColumn::make('status')
                    ->label('Status Berita')
                    ->badge()
                    ->formatStateUsing(function ($state) {
                        $labels = [
                            'published' => 'Dipublikasikan',
                            'not_published' => 'Tidak Dipublikasikan',
                        ];

                        return $labels[$state] ?? $state;
                    })
                    ->colors([
                        'success' => 'published',
                        'danger' => 'not_published',
                    ])
                    ->icons([
                        'heroicon-o-check-circle' => 'published',
                        'heroicon-o-x-circle' => 'not_published',
                    ]),

                TextColumn::make('created_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime('d M Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'published' => 'Published',
                        'not_published' => 'Not Published',
                    ])
                    ->label('Status Berita'),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->label('Lihat Berita')
                        ->icon('heroicon-o-eye')
                        ->color('secondary'),
                    Tables\Actions\EditAction::make()
                        ->label('Edit Berita')
                        ->icon('heroicon-o-pencil-square')
                        ->color('primary'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Hapus Berita')
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->successNotificationTitle('Berita berhasil dihapus.'),
                ])->label('Aksi'),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
