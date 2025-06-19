<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfileResource\Pages;
use App\Filament\Resources\ProfileResource\RelationManagers;
use App\Models\Profile;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Support\Str;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class ProfileResource extends Resource
{
    protected static ?string $model = Profile::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationLabel = 'Profil';

    protected static ?string $pluralModelLabel = 'Daftar Profil';

    public static function getNavigationGroup(): ?string
    {
        return 'Profil';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama Profil')
                    ->required()
                    ->maxLength(100)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                        if ($operation !== 'create') {
                            return;
                        }
                        $set('slug', Str::slug($state));
                    }),

                // saat Create
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->dehydrated()
                    ->disabled()
                    ->helperText('⚠️ Tidak perlu diisi, slug otomatis dibuat berdasarkan nama profil')
                    ->hidden(fn(string $operation): bool => $operation === 'create')
                    ->hidden(fn(string $operation): bool => $operation === 'edit'),

                // tampilkan saat edit
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->helperText('⚠️ Slug digunakan untuk URL berita')
                    ->visible(fn(string $operation): bool => $operation === 'edit'),

                TextInput::make('alamat')
                    ->label('Alamat')
                    ->required()
                    ->maxLength(50),

                TextInput::make('kontak')
                    ->label('Kontak')
                    ->required()
                    ->maxLength(50),

                FileUpload::make('gambar')
                    ->label('Gambar Profil')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('profile')
                    ->visibility('public')
                    ->imagePreviewHeight(150),

                RichEditor::make('deskripsi')
                    ->label('Deskripsi')
                    ->required()
                    ->maxLength(255),

                Select::make('status')
                    ->label('Status')
                    ->options([
                        'published' => 'Published',
                        'not_published' => 'Not Published'
                    ]),
            ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Nama Profil')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->wrap(),

                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->wrap(),

                TextColumn::make('kontak')
                    ->label('Kontak')
                    ->searchable()
                    ->sortable()
                    ->limit(20)
                    ->wrap(),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->wrap(),

                ImageColumn::make('gambar')
                    ->label('Gambar Profil')
                    ->disk('public')
                    ->visibility('public')
                    ->getStateUsing(function ($record) {
                        return $record->gambar ? asset('storage/' . $record->gambar) : null;
                    })
                    ->size(60)
                    ->square(),

                TextColumn::make('status')
                    ->label('Status')
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
                        'not_published' => 'Not Published'
                    ])
                    ->label('Status')
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make()
                        ->label('Lihat Profil')
                        ->icon('heroicon-o-eye')
                        ->color('secondary'),
                    Tables\Actions\EditAction::make()
                        ->label('Edit Profil')
                        ->icon('heroicon-o-pencil-square')
                        ->color('primary'),
                    Tables\Actions\DeleteAction::make()
                        ->label('Hapus Profil')
                        ->icon('heroicon-o-trash')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->successNotificationTitle('Profil berhasil dihapus'),
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
            'index' => Pages\ListProfiles::route('/'),
            'create' => Pages\CreateProfile::route('/create'),
            'edit' => Pages\EditProfile::route('/{record}/edit'),
        ];
    }
}
