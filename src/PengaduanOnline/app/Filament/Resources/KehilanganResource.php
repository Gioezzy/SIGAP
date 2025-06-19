<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KehilanganResource\Pages;
use App\Filament\Resources\KehilanganResource\RelationManagers;
use App\Models\Kehilangan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KehilanganResource extends Resource
{
    protected static ?string $model = Kehilangan::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-arrow-down';

    protected static ?string $navigationLabel = 'Kehilangan';

    protected static ?string $pluralModelLabel = 'Daftar Kehilangan';

    public static function getNavigationGroup(): ?string
    {
        return 'Kehilangan';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('created_at', 'desc')
            ->columns([
                TextColumn::make('user.name')
                    ->label('Nama Pengguna')
                    ->searchable()
                    ->wrap(),
                TextColumn::make('nama_barang')
                    ->label('Nama Barang')
                    ->wrap(),
                TextColumn::make('lokasi_hilang')
                    ->label('Lokasi Kehilangan')
                    ->wrap(),
                TextColumn::make('tanggal_hilang')
                    ->label('Tanggal Kehilangan')
                    ->sortable()
                    ->dateTime('d M Y'),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi Barang')
                    ->wrap(),
                ImageColumn::make('foto')
                    ->label('Gambar')
                    ->disk('public')
                    ->visibility('public')
                    ->getStateUsing(function ($record) {
                        return $record->foto ? asset('storage/' . $record->foto) : null;
                    })
                    ->size(60)
                    ->square(),

                TextColumn::make('status')
                    ->label('Status Kehilangan')
                    ->badge()
                    ->formatStateUsing(function ($state) {
                        $labels = [
                            'ditemukan' => 'Ditemukan',
                            'belum_ditemukan' => 'Belum Ditemukan',
                        ];
                        return $labels[$state] ?? $state;
                    })
                    ->colors([
                        'success' => 'ditemukan',
                        'danger' => 'belum_ditemukan',
                    ])
                    ->icons([
                        'heroicon-o-check-circle' => 'ditemukan',
                        'heroicon-o-x-circle' => 'belum_ditemukan',
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
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Action::make('view')
                    ->label('Respon')
                    ->icon('heroicon-o-chat-bubble-left-right')
                    ->color('primary')
                    ->url(fn($record)=>TanggapanKehilanganResource::getUrl('create', [
                        'id_kehilangan' => $record->id
                    ]))

            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        return false; // Disable create action for Kehilangan
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKehilangans::route('/'),
            'create' => Pages\CreateKehilangan::route('/create'),
            'edit' => Pages\EditKehilangan::route('/{record}/edit'),
        ];
    }
}
